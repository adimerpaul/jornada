<template>
  <q-layout view="lHh Lpr lFf" class="bg-grey-2">
    <q-header class="bg-grey-2">
      <q-toolbar>
        <q-toolbar-title class="text-bold text-primary text-center">
          Registro de estudiante
        </q-toolbar-title>
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view>
        <q-page>
          <div v-if="cupoBool" class="flex flex-center text-bold text-center text-h2 text-red-5">
            Este cupo ya fue registrado
          </div>
          <q-form class="q-pa-lg" v-else @submit.prevent="cupoUpdate">
            <div class="row">
              <div class="col-12 col-sm-6 q-px-xs"  >
                <q-input
                  v-model="cupo.ci"
                  label="Carnet de identidad"
                  outlined
                  required
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs"  >
                <q-input
                  required
                  v-model="cupo.nombres"
                  label="Nombre"
                  outlined
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs" >
                <q-input
                  v-model="cupo.apellidos"
                  label="Apellido"
                  outlined
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs" >
                <q-select
                  v-model="cupo.carrera"
                  label="Carrera"
                  outlined
                  :options="['SISTEMAS','INFORMATICA','CISCO','OTROS']"
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs" >
                <q-input
                  v-model="cupo.celular"
                  label="Celular"
                  outlined
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs" >
                <q-input
                  v-model="cupo.direccion"
                  label="Direccion"
                  outlined
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-6 q-px-xs" >
                <q-input
                  v-model="cupo.correo"
                  label="Correo"
                  type="email"
                  outlined
                  class="q-mb-md"
                />
              </div>
              <div class="col-12 col-sm-12 q-px-xs flex flex-center q-pb-xs">
                <q-uploader
                  accept=".jpg, .png"
                  @added="uploadFile"
                  auto-upload
                  max-files="1"
                  label="Subir foto"
                  flat
                  max-file-size="5000000"
                  @rejected="onRejected"
                  bordered
                />
              </div>
              <div class="col-12 col-sm-12 q-px-xs" >
                <q-btn
                  color="primary"
                  label="Registrar"
                  no-caps
                  type="submit"
                  icon="add_circle_outline"
                  class="full-width"
                  />
              </div>
            </div>
          </q-form>

        </q-page>
      </router-view>
    </q-page-container>

  </q-layout>

</template>

<script>
export default {
  name: `Registro`,
  data() {
    return {
      cupoBool: true,
      cupo: {
        ci: ``,
        nombres: ``,
        apellidos: ``,
        carrera: ``,
        celular: ``,
        direccion: ``,
        correo: ``,
        foto: ``,
      },
      foto: '',
      codigo:this.$route.params.id,
    }
  },
  mounted() {
    this.$q.loading.show()
    this.$api.get(`cupo/${this.codigo}`).then((response) => {
      this.cupo = response.data
      if (this.cupo.nombres==null) {
        this.cupoBool = false
      }
    }).finally(() => {
      this.$q.loading.hide()
    })
  },
  methods: {
    onRejected (rejectedEntries) {
      this.$q.notify({
        type: 'negative',
        message: `${rejectedEntries.length} el archivo paso las restricciones de validación`
      })
    },
    uploadFile (file) {
      let dialog = this.$q.dialog({
        message: 'Subiendo... 0%',
      })
      let percentage = 0
      const fd = new FormData()
      fd.append('file', file[0])
      return new Promise((resolve, reject) => {
        this.$api.post('upload',
          fd,
          {
            headers: { 'Content-Type': 'multipart/form-data' },
            onUploadProgress: (progressEvent) => {
              percentage = Math.round((progressEvent.loaded / progressEvent.total) * 100)
              dialog.update({
                message: `Subiendo... ${percentage}%`
              })
              if (percentage>=100){
                dialog.hide()
              }
            }
          })
          .then(res => {
            this.foto=res.data
            resolve(file)
          })
          .catch(err => reject(err))
      })
    },
    cupoUpdate() {
      if (this.foto=='') {
        this.$q.notify({
          message: 'Tienes que subir una foto',
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })
        return false
      }
      this.$q.dialog({
        title: 'Confirmación',
        message: '¿Estas seguro de registrar este cupo?',
        cancel: true,
        persistent: true
      }).onOk(() => {
        this.$q.loading.show()
        this.cupo.foto=this.foto
        this.$api.put(`cupo/${this.cupo.id}`, this.cupo).then((response) => {
          console.log(response.data)
          this.$q.notify({
            message: 'Cupo registrado',
            color: 'positive',
            icon: 'check_circle',
            position: 'top'
          })
          this.cupoBool = true
        }).finally(() => {
          this.$q.loading.hide()
        })
      })


    }
  }
}
</script>

<style scoped>

</style>
