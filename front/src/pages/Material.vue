<template>
  <q-page>
    <q-card>
      <q-card-section>
        <div class="row">
          <div class="col-12">
            <p class="text-red text-bold text-center">Marque los materiales a entregar </p>
          </div>
          <div class="col-12">PARTICIPANTE : {{cupo.nombres}}</div>
          <div class="col-xs-12 col-sm-6 ">
            <q-checkbox v-model="credencial" label="Credencial" />
          </div>
          <div class="col-xs-12 col-sm-6 ">
            <q-checkbox v-model="folder" label="Folder" />
          </div>
          <div class="col-xs-12 col-sm-6 ">
            <q-checkbox v-model="barbijo" label="Barbijo" />
          </div>
          <div class="col-xs-12 col-sm-6 ">
            <q-checkbox v-model="certificado" label="Certificado" />
          </div>
          <div class="col-xs-12 col-sm-6 ">
            <q-checkbox v-model="cd" label="CD" />
          </div>
          <div class="col-6 q-px-lg">
            <q-form @submit.prevent="BuscarCupo">
              <q-input label="Colocar el lector"   v-model="ci" outlined />
            </q-form>

          </div>
          <div class="col-6"><q-btn color="primary" icon="check" label="Entregar" @click="materialInsert" /></div>

        </div>
      </q-card-section>
    </q-card>
<div id="myelement" class="hidden"></div>
  </q-page>
</template>

<script>
import { Printd } from 'printd'
import {date} from "quasar";

export default {
  name: `Material`,
  data() {
    return {
      credencial: false,
      folder: false,
      barbijo: false,
      certificado: false,
      cd: false,
      ci: '',
      cupo:{},
    }
  },
  methods: {
    BuscarCupo(){
      this.cupo={}
      this.certificado=false
        this.folder=false
        this.barbijo=false
        this.certificado=false
        this.cd=false
      this.$api.post('buscarCupo/'+this.ci).then((response) => {
        console.log(response.data)
        this.cupo=response.data
        this.certificado=false
        this.folder=false
        this.barbijo=false
        this.certificado=false
        this.cd=false
        this.cupo.materials.forEach(r => {
            if(r.nombre=='CREDENCIAL') this.credencial=r.estado==1?true:false
            if(r.nombre=='FOLDER') this.folder=r.estado==1?true:false
            if(r.nombre=='BARBIJO') this.barbijo=r.estado==1?true:false
            if(r.nombre=='CERTIFICADO') this.certificado=r.estado==1?true:false
            if(r.nombre=='CD') this.cd=r.estado==1?true:false
        });

      })

    },
    materialInsert() {
      if (this.cupo.id==undefined) {
            this.$q.notify({
              message: 'Ingrese participante',
              color: 'negative',
              icon: 'warning',
              position: 'top',
            })
        return false
      }
      if (!this.credencial && !this.folder && !this.barbijo && !this.certificado && !this.cd) {
            this.$q.notify({
              message: 'No se puede entregar material sin seleccionar',
              color: 'negative',
              icon: 'warning',
              position: 'top',
            })
        return false
      }

      this.$q.loading.show()
      this.$api.post('material', {id:this.cupo.id,
        credencial: this.credencial,
        folder: this.folder,
        barbijo: this.barbijo,
        certificado: this.certificado,
        cd: this.cd,
        fecha:date.formatDate(new Date(), 'YYYY-MM-DD'),
        hora:date.formatDate(new Date(), "HH:mm:ss")
      })
        .then((response) => {
          console.log(response.data)

          this.$q.loading.hide()
          this.$q.notify({
            message: 'Material entregado',
            color: 'green-4',
            textColor: 'white',
            icon: 'done',
            position: 'top',
          })
          const d = new Printd()
          let fecha = date.formatDate(new Date(), 'DD/MM/YYYY HH:mm:ss')
          document.getElementById('myelement').innerHTML = `
<style>
.center {
  text-align: center;
}
.left {
  text-align: left;
}
.right {
  text-align: right;
}
.bold {
  text-weight: bold;
}
</style>
          <div class="center bold"> <b>Universidad Técnica de Oruro</b></div>
          <div class="center bold"> <b>Facultad Nacional de Ingeniería</b></div>
          <div class="left "> <b>Nombre: </b> ${student.nombres}</div>
          <div class="left "> <b>Carrera: </b> ${student.carrera}</div>
          <div class="left "> <b>Fecha hora: </b> ${fecha}</div>
          <div class="left "> <b>Material entregado: </b> ${materiales}</div>

          <div style="border-top: 2px dotted #1a202c;margin-top: 50px" class="center">FIRMA</div>
          `
          d.print( document.getElementById('myelement') )
          // this.credencial = false
          // this.folder = false
          // this.barbijo = false
          // this.certificado = false
          this.cupo = {}
          this.certificado=false
          this.folder=false
          this.barbijo=false
          this.certificado=false
          this.cd=false

        })
        .catch((error) => {
          this.$q.loading.hide()
          this.$q.notify({
            message: 'Error al entregar material',
            color: 'red-4',
            textColor: 'white',
            icon: 'error',
            position: 'top',
          })
        })
    },
  },
}
</script>

<style scoped>

</style>
