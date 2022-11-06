<template>
    <q-page>
      <q-table
        virtual-scroll
        :virtual-scroll-item-size="48" dense :rows-per-page-options="[15,100,150,500]" :rows="cupos" :columns="cupoColumns" :filter="cupoSearch">
        <template v-slot:top-right>
            
          <q-input dense outlined placeholder="Buscar..." v-model="cupoSearch">
            <template v-slot:prepend>
              <q-icon name="search" />
            </template>
          </q-input>
        </template>
        <template v-slot:body-cell-estado="props">
          <q-td :props="props">
            <q-chip :color="props.row.estado=='Libre'?'green':'red'" text-color="white" dense>{{props.row.estado}}</q-chip>
          </q-td>
        </template>
        <template v-slot:body-cell-action="props">
          <q-td :props="props">
            <q-btn flat round dense icon="edit" @click="editEst(props.row)" />
            <q-btn flat round dense icon="remove" @click="delteEst(props.row)" />
          </q-td>
        </template>
      </q-table>
    <!--  <pre>{{store.cupos}}</pre>-->
    </q-page>
    </template>
    
    <script>
    import {useCounterStore} from "stores/example-store";
    import {jsPDF} from "jspdf";
    import QRCode from 'qrcode'
    import download from 'downloadjs'
    
    export default {
      name: `Cupo`,
      data() {
        return {
          selected: [],
          url: process.env.API,
          cupoSearch: '',
          store:useCounterStore(),
          estudiantes:[],
          cupoColumns:[
            {name:'action', label:'Acción', field:'action', align:'left', sortable:true},
            {name:'ci', label:'C.I.', field:'ci', align:'left', sortable:true},
            {name:'id', label:'ID', field:'id', align:'left', sortable:true},
            {name:'nombre', label:'Nombre', field:'nombre', align:'left', sortable:true},
            {name:'carrera', label:'Carrera', field:'carrera', align:'left', sortable:true},
            {name:'celular', label:'Celular', field:'celular', align:'left', sortable:true},
            {name:'direccion', label:'direccion', field:'direccion', align:'left', sortable:true},
          ]
        }
      },
      created() {
        // if (this.store.cupos.length === 0) {
          this.cupoGet();
        // }
      },
      computed: {
      },
      methods: {

        cupoRegister(cupo){
          window.open(process.env.API_FRONT+'registro/'+cupo.codigo,'_blank')
        },

        cupoReset(cupo){
          this.$q.dialog({
            title: 'Confirmación',
            message: '¿Está seguro de resetear el cupo?',
            ok: {
              label: 'Si',
              color: 'primary',
              flat: true,
              noDismiss: true
            },
            cancel: {
              label: 'No',
              color: 'primary',
              flat: true,
              noDismiss: true
            }
          }).onOk(() => {
            this.$api.put('cupo/'+cupo.id,{
              ci: "",
              nombres: "",
              apellidos: '',
              carrera: '',
              foto: 'avatar.png',
              celular: '',
              direccion: '',
              correo: '',
              credencial: false,
              folder: false,
              barbijo: false,
              certificado: false,
            }).then((response) => {
              // console.log(response.data)
              this.$q.notify({
                message: 'Cupo reseteado',
                color: 'green-4',
                textColor: 'white',
                icon: 'check_circle',
                position: 'top'
              })
              this.cupoGet();
            }).catch((error) => {
              this.$q.notify({
                message: 'Error al resetear el cupo',
                color: 'red-4',
                textColor: 'white',
                icon: 'error',
                position: 'top'
              })
            })
          })
        },
        cupoPrint: function () {
          if (this.selected.length <= 0) {
            this.$q.notify({
              color: 'red-4',
              textColor: 'white',
              icon: 'report_problem',
              position: 'top',
              message: 'No hay registros seleccionados'
            });
            return false;
          }
    
          this.$q.loading.show()
          this.$api.post('cupoPdf',this.selected).then(response => {
            console.log(response.data);
            window.open(this.url+'cupoFile', '_blank');
              this.$q.notify({
                color: 'green-4',
                textColor: 'white',
                icon: 'check_circle',
                position: 'top',
                message: 'PDF generado'
              });
          })
            .catch(error => {
            this.$q.notify({
              color: 'red-4',
              textColor: 'white',
              icon: 'report_problem',
              position: 'top',
              message: 'Error al generar PDF'
            });
          })
            .finally(() => {
            this.$q.loading.hide()
          })
    

        },


        cupoGet() {
          this.$q.loading.show();
          this.store.estudiantes=[];
          this.$api.get(`student`).then((res) => {
            this.estudiantes=res.data
        
          }).catch((error) => {
              console.log(error);
          }).finally(() => {
            this.$q.loading.hide();
          });
        },
      },
    
    }
    </script>
    
    <style scoped>
    
    </style>
    