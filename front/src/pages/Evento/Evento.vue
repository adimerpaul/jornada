<template>
<q-page>
  <q-table
    virtual-scroll
    :virtual-scroll-item-size="48"
    :selected-rows-label="getSelectedString" v-model:selected="selected"
    title="Eventos"
    selection="multiple" dense :rows-per-page-options="[15,100,150,500]" :rows="eventos" :columns="eventoColumns" :filter="eventoSearch">
    <template v-slot:top-right>
      <q-btn flat round dense icon="o_print" @click="eventoPrint" />
      <q-btn flat round dense icon="refresh" @click="eventoGet();eventoSearch=''" />
      <q-btn color="green" dense icon="add_circle_outline" @click="eventoAdd" label="Agregar" no-caps />
<!--      <q-input dense outlined placeholder="Buscar..." v-model="eventoSearch">-->
<!--        <template v-slot:prepend>-->
<!--          <q-icon name="search" />-->
<!--        </template>-->
<!--      </q-input>-->
    </template>
    <template v-slot:body-cell-estado="props">
      <q-td :props="props">
        <q-chip :color="props.row.estado=='Libre'?'green':'red'" text-color="white" dense>{{props.row.estado}}</q-chip>
      </q-td>
    </template>
    <template v-slot:body-cell-action="props">
      <q-td :props="props" >
        <template v-if="store.user.role=='ADMINISTRADOR'">
          <q-btn flat round dense icon="qr_code" @click="qrPrint(props.row)" />
          <q-btn flat round dense icon="public" @click="eventoRegister(props.row)" />
<!--          <q-btn flat round dense icon="recycling" @click="eventoReset(props.row)" />-->
<!--          <q-btn flat round dense icon="published_with_changes" @click="eventoChange(props.row)" />-->
<!--          boton editar-->
          <q-btn flat round dense icon="edit" @click="eventoChange(props.row)" />
        </template>
      </q-td>
    </template>
    <template v-slot:body-cell-foto="props">
      <q-td :props="props">
        <q-btn flat round dense icon="o_rotate_90_degrees_cw" @click="rotateFoto(props.row)" />
        <q-img @click="fotoShow(props.row)" :src="url+'../imagenes/'+props.row.foto" width="30px" height="30px" />
      </q-td>
    </template>

  </q-table>
  <q-dialog v-model="eventoDialog">
    <q-card style="max-width: 400px">
      <q-card-section>
        <q-card-section>
          <div class="text-h6">Evento</div>
        </q-card-section>
        <q-card-section>
          <q-form @submit="eventoUpdate">
          <q-input v-model="evento.nombre" label="Nombre" outlined :rules="[val => !!val || 'Campo requerido']"/>
          <q-input v-model="evento.descripcion" label="Descripción" outlined :rules="[val => !!val || 'Campo requerido']"/>
<!--          <q-input v-model="evento.codigo" label="Código" outlined/>-->
<!--          localtime-->
          <q-input v-model="evento.fecha_inicio" label="Inicio" type="datetime-local" outlined :rules="[val => !!val || 'Campo requerido']"/>
          <q-input v-model="evento.fecha_fin" label="Fin" type="datetime-local" outlined :rules="[val => !!val || 'Campo requerido']"/>
          <q-input v-model="evento.cupos" label="Cupos" type="number" outlined :rules="[val => !!val || 'Campo requerido']"/>
            <q-card-actions align="right">
              <q-btn flat label="Cancelar" v-close-popup />
              <q-btn color="primary" label="Guardar" type="submit" />
            </q-card-actions>
          </q-form>
        </q-card-section>
      </q-card-section>

    </q-card>
  </q-dialog>
<!--  <pre>{{store.eventos}}</pre>-->
</q-page>
</template>

<script>
import {useCounterStore} from "stores/example-store";
import {jsPDF} from "jspdf";
import QRCode from 'qrcode'
import download from 'downloadjs'
import moment from 'moment'

export default {
  name: `Cupo`,
  data() {
    return {
      selected: [],
      url: process.env.API,
      eventoSearch: '',
      store:useCounterStore(),
      eventos: [],
      eventoUpdateShow: false,
      valida:true,
      eventoColumns:[
        {name:'action', label:'Acción', field:'action', align:'left', sortable:true},
        {name:'nombre', label:'Nombre', field:'nombre', align:'left', sortable:true},
        {name:'descripcion', label:'Descripción', field:'descripcion', align:'left', sortable:true},
        {name:'codigo', label:'Código', field:'codigo', align:'left', sortable:true},
        {name:'fecha_inicio', label:'Inicio', field:'fecha_inicio', align:'left', sortable:true},
        {name:'fecha_fin', label:'Fin', field:'fecha_fin', align:'left', sortable:true},
        {name:'estado', label:'Estado', field:'estado', align:'left', sortable:true},
        {name:'cupos', label:'Cupos', field:'cupos', align:'left', sortable:true},
      ],
      eventoDialog: false,
      evento: {
        id: 0,
        nombre: '',
        descripcion: '',
        codigo: '',
        fecha_inicio: '',
        fecha_fin: '',
        estado: '',
        cupos: 0,
      },
    }
  },
  created() {
    // if (this.store.eventos.length === 0) {
      this.eventoGet();
    // }
  },
  computed: {
  },
  methods: {
    eventoUpdate(){
      if (this.evento.id === 0) {
        this.$api.post('evento', this.evento).then((response) => {
          this.$q.notify({
            message: 'Evento creado',
            color: 'green-4',
            textColor: 'white',
            icon: 'check_circle',
            position: 'top'
          })
          this.eventoDialog = false
          this.eventoGet()
        }).catch((error) => {
          this.$q.notify({
            message: 'Error al crear el evento',
            color: 'red-4',
            textColor: 'white',
            icon: 'error',
            position: 'top'
          })
        })
      } else {
        this.$api.put('evento/'+this.evento.id, this.evento).then((response) => {
          this.$q.notify({
            message: 'Evento actualizado',
            color: 'green-4',
            textColor: 'white',
            icon: 'check_circle',
            position: 'top'
          })
          this.eventoDialog = false
          this.eventoGet()
        }).catch((error) => {
          this.$q.notify({
            message: 'Error al actualizar el evento',
            color: 'red-4',
            textColor: 'white',
            icon: 'error',
            position: 'top'
          })
        })
      }
    },
    qrPrint(row){
      // console.log(row)
      QRCode.toDataURL(process.env.API_FRONT+'registro/'+row.codigo)
        .then(url => {
          this.$q.dialog({
            title: 'Código QR',
            message: `<a href="${url}" target="_blank"><div style="text-align: center"><img src="${url}" /></div></a>`,
            html: true,
            ok: false,
            // persistent: true,
            cancel: {
              label: 'Cerrar',
              color: 'primary',
              flat: true,
              noDismiss: true
            }
          })
          // console.log(url)
        })
        .catch(err => {
          console.error(err)
        })
    },
    eventoRegister(evento){
      window.open(process.env.API_FRONT+'evento/'+evento.codigo,'_blank')
    },
    rotateFoto(row){
      this.$q.dialog({
        title: 'Rotar Foto',
        message: '¿Desea rotar la foto?',
        ok: {
          label: 'Rotar',
          color: 'primary',
          flat: true,
          noDismiss: true,
        },
        cancel: {
          label: 'Cancelar',
          color: 'primary',
          flat: true,
          noDismiss: true
        }
      }).onOk(() => {
        this.$q.loading.show()
        this.$api.post(this.url+'rotateFoto',row)
          .then(response => {
            row.foto = response.data.foto
            // console.log(response.data)
            this.$q.loading.hide()
            // this.eventoGet()
          })
          .catch(error => {
            this.$q.loading.hide()
            console.log(error)
          })
      })


    },
    eventoChange(evento){
      this.eventoDialog=true
      // console.log(evento)
      this.evento={...evento}
    },
    eventoReset(evento){
      this.valido=true
      evento.materials.forEach(r => {
          if(r.estado==1){
            this.valido=false
          }
      })
      if(!this.valido){
        this.$q.notify({
            message: 'Existe registro material',
            color: 'red-4',
            textColor: 'white',
            icon: 'info',
            position: 'top'
          })
        return false;
      }
      this.$q.dialog({
        title: 'Confirmación',
        message: '¿Está seguro de resetear el evento?',
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
        this.$api.put('evento/'+evento.id,{
          ci: "",
          nombres: "",
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
          this.eventoGet();
        }).catch((error) => {
          this.$q.notify({
            message: 'Error al resetear el evento',
            color: 'red-4',
            textColor: 'white',
            icon: 'error',
            position: 'top'
          })
        })
      })
    },
    eventoAdd() {
      this.evento = {
        id: 0,
        nombre: '',
        descripcion: '',
        // codigo: '',
        fecha_inicio: moment().format('YYYY-MM-DDTHH:mm'),
        fecha_fin: moment().format('YYYY-MM-DDTHH:mm'),
        // estado: '',
        cupos: 0,
      }
      this.eventoDialog = true
    },
    eventoPrint: function () {
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
      this.$api.post('eventoPdf',this.selected).then(response => {
        console.log(response.data);
        window.open(this.url+'eventoFile', '_blank');
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

      // const doc = new jsPDF('landscape', null, 'letter');
      // let img = new Image()
      // img.src = "folleto.jpg"
      // this.selected.forEach((item, index) => {
      //   if (index % 2 === 0) {
      //     doc.addImage(img, 'JPEG', 4, 5, 135, 205)
      //     doc.setFont("helvetica", "bold");
      //     doc.setFontSize(10);
      //     doc.setTextColor(125, 125, 125);
      //     doc.text(item.id + '', 135, 200, 'center')
      //     doc.addImage(item.qr, 'JPEG', 10, 10, 10, 10)
      //   } else if (index % 2 === 1) {
      //     doc.addImage(img, 'JPEG', 140, 5, 135, 205)
      //     doc.setFont("helvetica", "bold");
      //     doc.setFontSize(10);
      //     doc.setTextColor(125, 125, 125);
      //     doc.text(item.id + '', 270, 200, 'center')
      //     doc.addPage();
      //   }
      // });
      //
      //
      // // $( '#docpdf' ).attr('src', doc.output('datauristring'));
      // // doc.save("Certificado "+date.formatDate(Date.now(),'DD-MM-YYYY')+".pdf");
      // window.open(doc.output('bloburl'), '_blank');

    },
    getSelectedString () {
      return this.selected.length === 0 ? '' : `${this.selected.length} registro${this.selected.length > 1 ? 's' : ''} seleccionados de ${this.store.eventos.length}`
    },
    fotoShow(row) {
      this.$q.dialog({
        title: 'Foto',
        message: '<img src="'+this.url+'../imagenes/'+row.foto+'" width="100%" />',
        html: true,
        persistent: true,
        ok: {
          label: 'Cerrar',
          color: 'primary'
        }
      })
    },
    CambioTipo() {
      this.$q.loading.show();
      this.$api.post(`updateTipo`,this.evento).then((res) => {
      }).catch((error) => {
          console.log(error);
      }).finally(() => {
        this.eventoUpdateShow=false
        this.$q.loading.hide();
      });
  },
    eventoGet() {
      this.$q.loading.show();
      this.store.eventos=[];
      this.eventos=[]
      this.$api.get(`evento`).then((res) => {
        res.data.forEach((item) => {
          // item.estado=item.nombres==null?'Libre':'Ocupado';
          // item.nombre=(item.nombres==null?'':item.nombres)+' '+(item.apellidos==null?'':item.apellidos)
          // QRCode.toDataURL(process.env.API_FRONT+'registro/'+item.codigo)
          //   .then(url => {
          //     item.qr = url;
          //   })
          //   .catch(err => {
          //     console.error(err)
          //   })
          this.eventos.push(item);
        });
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
