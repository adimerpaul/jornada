<template>
  <q-page class="bg-grey-3">
    <q-card class="q-pa-md">
      <q-card-section class="q-pa-xs">
        <div class="col-6 text-h5 text-bold text-center" style="text-transform: uppercase;">{{ evento.nombre }}<br><span class="text-h6">{{evento.descripcion}}</span></div>
        <div class="col-12"><q-input dense square outlined v-model="cedula" label="Carnet" /></div>
        <div class="col-12 q-pa-xs" align="center"> <q-btn color="green" label="Registrar"  @click="registro" :loading="loading" />
        </div>
      </q-card-section>
      <div class="row">
        <div class="col-12 col-md-3">
            <q-item>
              <q-item-section avatar>
                <q-icon name="event" size="2rem" />
              </q-item-section>
              <q-item-section>
                <q-item-label class="text-grey text-bold">Fecha Inicio</q-item-label>
                <q-item-label>{{evento.fecha_inicio}}</q-item-label>
              </q-item-section>
            </q-item>
        </div>
        <div class="col-12 col-md-3">
            <q-item>
              <q-item-section avatar>
                <q-icon name="event" size="2rem" />
              </q-item-section>
              <q-item-section>
                <q-item-label class="text-grey text-bold">Cupos</q-item-label>
                <q-item-label>
                  <q-badge color="primary" text-color="white" dense>{{evento.cupos}}</q-badge>
                </q-item-label>
              </q-item-section>
            </q-item>
        </div>
        <div class="col-12 col-md-3">
          <q-item>
            <q-item-section avatar>
              <q-icon name="event" size="2rem" />
            </q-item-section>
            <q-item-section>
              <q-item-label class="text-grey text-bold">Libres</q-item-label>
              <q-item-label>
                <q-badge color="orange" text-color="white" dense>{{evento.libres}}</q-badge>
              </q-item-label>
            </q-item-section>
          </q-item>
        </div>
        <div class="col-12 col-md-3">
          <q-item>
            <q-item-section avatar>
              <q-icon name="event" size="2rem" />
            </q-item-section>
            <q-item-section>
              <q-item-label class="text-grey text-bold">Entregados</q-item-label>
              <q-item-label>
                <q-badge color="green" text-color="white" dense>{{evento.registrados}}</q-badge>
              </q-item-label>
            </q-item-section>
          </q-item>
        </div>
        <div class="col-12">
          <q-table :rows-per-page-options="[0]" :rows="evento.cupo" :columns="columns" row-key="id" :filter="search">
            <template v-slot:top-right>
              <q-input v-model="search" debounce="500" placeholder="Buscar" outlined dense clearable>
                <template v-slot:append>
                  <q-icon name="search" />
                </template>
              </q-input>
            </template>
            <template v-slot:body-cell-opcion="props">
              <q-td :props="props">
                <q-btn color="green" outline label="Validar" no-caps @click="registrar(props.row,'REGISTRADO')"
                       icon="mdi-check" dense :loading="loading" v-if="props.row.estado == 'PENDIENTE' || props.row.estado == 'ANULADO'" />
                <q-btn color="red" outline label="Anular" no-caps @click="registrar(props.row,'ANULADO')"
                       icon="mdi-close" dense :loading="loading" v-else-if="$store.role=='ADMINISTRADOR'" />
<!--                <pre>{{store.user}}</pre>-->
              </q-td>
            </template>
            <template v-slot:body-cell-estado="props">
              <q-td :props="props">
                <q-chip color="orange" text-color="white" dense v-if="props.row.estado == 'PENDIENTE'">Pendiente</q-chip>
                <q-chip color="green" text-color="white" dense v-if="props.row.estado == 'REGISTRADO'">Registrado</q-chip>
                <q-chip color="red" text-color="white" dense v-if="props.row.estado == 'ANULADO'">Anulado</q-chip>
              </q-td>
            </template>
          </q-table>
        </div>
      </div>
    </q-card>
<!--    <pre>{{evento}}</pre>-->
  </q-page>
</template>
<script>
import {useCounterStore} from "stores/example-store";
export default {
  name: `ShowEvento`,
  data() {
    return {
      store:useCounterStore(),
      evento: {},
      cedula:'',
      loading: false,
      search: '',
      id:this.$route.params.id,
      mensaje:'',
      columns: [
        { name: 'opcion', label: 'Opcion', align: 'center', field: row => row.opcion },
        { name: 'estado', label: 'Estado', align: 'center', field: row => row.estado },
        { name: 'student', label: 'Estudiante', align: 'center', field: row => row.cupo_registro?.nombres },
        { name: 'ci', label: 'Carnet', align: 'center', field: row => row.ci },
        { name: 'fecha_registro', label: 'Fecha Registro', align: 'center', field: row => row.fecha_registro },
        { name: 'user_id', label: 'Usuario', align: 'center', field: row => row.user?.name },
      ]
    }
  },
  created() {
    this.eventoGet()
  },
  methods:{
    eventoGet(){
      // this.$q.loading.show()
      this.$api.get(`evento/${this.$route.params.id}`).then((response) => {
        this.evento = response.data
      }).finally(() => {
        // this.$q.loading.hide()
      })
    },
    registrar(row,estado){
      this.loading = true
      this.$api.put('registroEvento/'+row.id,{
        estado: estado
      }).then((response) => {
        this.$q.notify({
          message: estado,
          icon: 'info',
          color:'green',
          position: 'top'
        })
        this.eventoGet()
      }).catch(err => {
        this.$q.notify({
          message: err.response.data.message,
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })
      }).finally(() => {
        this.loading = false
      })
    },
    registro(){
    this.$api.post('buscarEventoEst',{id:this.id,ci:this.cedula}).then((response) => {
      console.log(response.data)
      this.$q.notify({
          message: 'REGISTRADO',
          icon: 'info',
          color:'green',
          position: 'top'
        })
      }).catch(err => {
        this.$q.notify({
          message: err.response.data.message,
          type: 'negative',
          icon: 'warning',
          position: 'top'
        })

    })
  }
}
}
</script>
