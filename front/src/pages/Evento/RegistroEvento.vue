<template>
  <q-layout view="lHh Lpr lFf" class="bg-grey-2">
    <q-header class="bg-grey-2">
      <q-toolbar>
        <q-toolbar-title class="text-bold text-primary text-center">
          Evento: {{evento.nombre}}
          <br>
          <div class="text-subtitle1">
            Desc: {{evento.descripcion}}
            <br>
            Desde: {{evento.fecha_inicio}}
            <br>
            Hasta: {{evento.fecha_fin}}
            <br>
            Cupos: <span class="text-red text-subtitle2 text-h6">{{evento.libres}}</span>
          </div>
        </q-toolbar-title>
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view>
        <q-page>
          <div class="flex flex-center text-bold text-center text-h2 text-red-5"
                v-if="evento.id==undefined">
            El evento no existe
          </div>
          <q-form class="q-pa-lg" v-else @submit.prevent="cupoUpdate">
            <div class="row">
              <div class="col-12 col-sm-12 q-px-xs"  >
                <div class="text-caption">
                  Porfavor ingrese el carnet de identidad del estudiante y su nombre aparecera automaticamente
                </div>
                <q-input
                  @update:modelValue="studentSearch"
                  v-model="ci"
                  label="Carnet de identidad"
                  outlined
                  required
                  class="q-mb-md"
                  debounce="500"
                />
                <q-input
                  v-model="nombres"
                  label="Nombres"
                  outlined
                  readonly
                  class="q-mb-md"
                  :loading="loadingText"
                />
                <q-input
                  v-model="carrera"
                  label="Carrera"
                  outlined
                  readonly
                  class="q-mb-md"
                  :loading="loadingText"
                />
                <q-btn color="primary" label="Validar" @click="registrar" icon="mdi-check"
                       class="full-width q-mb-md" no-caps size=" 30px" :loading="loading"/>
              </div>
            </div>
          </q-form>
<!--          <q-btn color="white" text-color="black" label="Standard" @click="impresion"/>-->

        </q-page>
      </router-view>
    </q-page-container>

  </q-layout>

</template>

<script>
import { jsPDF } from "jspdf";
export default {
  name: `Registro`,
  data() {
    return {
      cupoBool: true,
      foto: '',
      ci:'',
      nombres:'',
      carrera:'',
      loading:false,
      codigo:this.$route.params.id,
      evento: {},
      reg:false,
      mensaje:'',
      loadingText:false
    }
  },
  created() {
    this.$q.loading.show()
    this.$api.get(`eventoSearch/${this.codigo}`).then((response) => {
      this.evento = response.data
    }).finally(() => {
      this.$q.loading.hide()
    })
  },
  mounted() {
    // this.$q.loading.show()
    // this.$api.get(`cupo/${this.codigo}`).then((response) => {
    //   this.cupo = response.data
    //   if (this.cupo.nombres==null) {
    //     this.cupoBool = false
    //   }
    // }).finally(() => {
    //   this.$q.loading.hide()
    // })
  },
  methods: {
    registrar(){
      this.loading=true
      this.$api.get('eventoCupoRegister/'+this.ci+'/'+this.codigo).then(response => {
        this.$q.notify({
          message: 'Cupo registrado',
          color: 'positive',
          icon: 'check_circle',
          position: 'top'
        })
        this.ci=''
        this.nombres=''
        this.carrera=''
        this.$api.get(`eventoSearch/${this.codigo}`).then((response) => {
          this.evento = response.data
        }).finally(() => {
          this.$q.loading.hide()
        })
      }).finally(() => {
        this.loading=false
      }).catch(err => {
        this.$q.notify({
          message: err.response.data.message,
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })
      })
    },
    validar(ci){
      this.$api.post('validaCupon/'+ci).then(response => {
        console.log(response.data)
        this.reg=false
        this.mensaje=''
          if(response.data && response.data.id!=this.cupo.id){
            this.reg=true
            this.mensaje='El ci esta registrado'
          }
      })

    },
    impresion(){
          let cm=this;
          var doc = new jsPDF('P','cm','letter')
          doc.setFont("courier");
          var img = new Image()
          img.src = 'baner.jpg'
          doc.addImage(img, 'jpg', 1, 0.5, 19, 2)
          doc.setFont(undefined,'bold')
          doc.setFontSize(12);
          doc.text(5, 3, 'II JORNADAS DE TECNOLGIAS DE COMUNICACION 2022')
          doc.text(8, 3.5, 'FORMULARIO DE INSCRIPCION')
          doc.text(8, 4.5, 'DATOS DEL PARTICIPANTE')
          doc.text(3, 5, 'CI')
          doc.text(3, 5.5, 'NOMBRE')
          doc.text(3, 6, 'CARRERA')
          doc.text(3, 6.5, 'CELULAR')
          doc.text(3, 7, 'CORREO')
          doc.setFont(undefined,'normal')

          doc.text(6, 5, cm.cupo.ci+'')
          doc.text(6, 5.5, cm.cupo.nombres)
          doc.text(6, 6, cm.cupo.carrera)
          doc.text(6, 6.5, cm.cupo.celular==null?'':cm.cupo.celular)
          doc.text(6, 7, cm.cupo.correo==null?'':cm.cupo.correo)
          doc.save(cm.cupo.ci+".pdf");
          //window.open(doc.output('bloburl'), '_blank');
    },
    onRejected (rejectedEntries) {
      this.$q.notify({
        type: 'negative',
        message: `${rejectedEntries.length} el archivo paso las restricciones de validación`
      })
    },
    uploadFile (file) {
      this.loading=true
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
            this.loading=false
            resolve(file)
          })
          .catch(err => reject(err))
      })
    },
    studentSearch(ci){
      this.nombres=""
      this.carrera=""
      if (ci.length<4) {
        return false
      }
      this.loadingText=true
      this.$api.get(`searchStudent/${ci}/${this.codigo}`).then(response => {
        console.log(response.data)
        if (response.data==null) {
          return false
        }
        this.nombres = response.data.nombres
        this.carrera = response.data.carrera
      }).catch(err => {
        this.$q.notify({
          message: err.response.data.message,
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })
      }).finally(() => {
        this.loadingText=false
      })
    },
    cupoUpdate() {
      if(this.reg){
        return false
      }
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
        this.cupo.nombres= this.cupo.nombres.toUpperCase()
        this.$api.put(`updateRegistro/${this.cupo.id}`, this.cupo).then((response) => {
          console.log(this.cupo)
          console.log(response.data)
          this.impresion(this.cupo)
          this.$q.notify({
            message: 'Cupo registrado',
            color: 'positive',
            icon: 'check_circle',
            position: 'top'
          })
          this.cupoBool = true
        }).catch(res=>{
          this.$q.notify({
            message: res.response.data.message,
            color: 'negative',
            icon: 'warning',
            position: 'top'
          })
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
