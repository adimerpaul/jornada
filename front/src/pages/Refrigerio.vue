<template>
  <q-page>
    <q-card>
      <q-card-section>
        <div class="row">
          <div class="col-12 q-px-lg">
            <q-form @submit.prevent="refrigerioInsert">
              <q-input label="Colocar el lector"   v-model="ci" outlined />
            </q-form>
          </div>
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
  name: `Refrigerio`,
  data() {
    return {
      ci: '',
    }
  },
  methods: {
    refrigerioInsert() {
      this.$q.loading.show()
      this.$api.post('updateMaterial/'+this.ci)
        .then((response) => {
          let student = response.data
          this.$q.loading.hide()
          this.$q.notify({
            message: 'Se ha entregado el refrigerio',
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
          <div class="center bold"> <b>TICKET REFRIGERIO</b></div>
          <div class="left "> <b>Nombre: </b> ${student.nombres}</div>
          <div class="left "> <b>Carrera: </b> ${student.carrera}</div>
          <div class="left "> <b>Fecha hora: </b> ${fecha}</div>

          <div style="border-top: 2px dotted #1a202c;margin-top: 50px" class="center">FIRMA</div>
          `
          d.print( document.getElementById('myelement') )
          // this.credencial = false
          // this.folder = false
          // this.barbijo = false
          // this.certificado = false
          this.ci = ''
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
