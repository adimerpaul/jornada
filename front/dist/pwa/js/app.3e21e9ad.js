(()=>{"use strict";var e={2661:(e,o,t)=>{t(8964);var l=t(1957),a=t(1947),r=t(499),s=t(9835);function i(e,o,t,l,a,r){const i=(0,s.up)("router-view");return(0,s.wg)(),(0,s.j4)(i)}const n=(0,s.aZ)({name:"App"});var c=t(1639);const d=(0,c.Z)(n,[["render",i]]),u=d;var p=t(3340),m=t(1809);const h=(0,p.h)((()=>{const e=(0,m.WB)();return e}));var g=t(8339),f=t(6970);const b={class:"row"},w={class:"col-12 col-sm-6 q-pa-md"},v={class:"text-h6 text-white"},q={class:"text-h2 text-white"},y={class:"col-12 col-sm-6 q-pa-md"},_={class:"text-h6 text-white"},x={class:"text-h2 text-white"};function C(e,o,t,l,a,r){const i=(0,s.up)("q-btn"),n=(0,s.up)("q-card-section"),c=(0,s.up)("q-card"),d=(0,s.up)("q-page");return(0,s.wg)(),(0,s.j4)(d,{class:""},{default:(0,s.w5)((()=>[(0,s._)("div",b,[(0,s._)("div",w,[(0,s.Wm)(c,{class:"bg-green"},{default:(0,s.w5)((()=>[(0,s.Wm)(n,null,{default:(0,s.w5)((()=>[(0,s._)("div",v,[(0,s.Uk)("Libres "),(0,s.Wm)(i,{flat:"",dense:"",onClick:r.actualizar,icon:"refresh"},null,8,["onClick"])])])),_:1}),(0,s.Wm)(n,null,{default:(0,s.w5)((()=>[(0,s._)("div",q,(0,f.zw)(a.libres),1)])),_:1})])),_:1})]),(0,s._)("div",y,[(0,s.Wm)(c,{class:"bg-red"},{default:(0,s.w5)((()=>[(0,s.Wm)(n,null,{default:(0,s.w5)((()=>[(0,s._)("div",_,[(0,s.Uk)("Ocupados "),(0,s.Wm)(i,{flat:"",dense:"",onClick:r.actualizar,icon:"refresh"},null,8,["onClick"])])])),_:1}),(0,s.Wm)(n,null,{default:(0,s.w5)((()=>[(0,s._)("div",x,(0,f.zw)(a.ocupados),1)])),_:1})])),_:1})])])])),_:1})}const k={data(){return{libres:0,ocupados:0}},created(){this.actualizar()},methods:{actualizar(){this.$q.loading.show(),this.$api.get("cupo").then((e=>{this.libres=0,this.ocupados=0,e.data.forEach((e=>{""!=e.nombres?this.ocupados++:this.libres++}))})).finally((()=>{this.$q.loading.hide()}))}}};var $=t(9885),S=t(4458),W=t(3190),P=t(4455),Z=t(9984),A=t.n(Z);const j=(0,c.Z)(k,[["render",C]]),Q=j;A()(k,"components",{QPage:$.Z,QCard:S.Z,QCardSection:W.Z,QBtn:P.Z});const O=e=>((0,s.dD)("data-v-d35f83a8"),e=e(),(0,s.Cn)(),e),I={class:"row"},V=O((()=>(0,s._)("div",{class:"col-1 col-sm-4"},null,-1))),U={class:"col-10 col-sm-4"},E=O((()=>(0,s._)("div",{class:"text-subtitle1 text-center q-pt-xs text-grey"},"CUENTA",-1))),L=O((()=>(0,s._)("div",{class:"text-h2 text-center q-pa-xs text-black text-bold"},"Tu Cuenta",-1))),T={class:"row"},R={class:"col-12"},D={class:"col-12 q-pt-lg"},B={class:"col-12 q-py-xs"},z={class:"col-12 q-pt-xs"},F=O((()=>(0,s._)("div",{class:"col-12 q-pt-xs"},null,-1))),N=O((()=>(0,s._)("div",{class:"col-12 text-center q-py-none"},[(0,s._)("a",{href:"",class:"text-blue-8"},"¿Olvidaste tu contraseña?")],-1))),M=O((()=>(0,s._)("div",{class:"text-subtitle1 text-center text-caption q-pt-lg text-grey"},[(0,s.Uk)("AL INICIAR SESIÓN, USTED ACEPTA LOS "),(0,s._)("a",{href:"",class:"text-blue-8"},"TÉRMINOS DEL SERVICIO"),(0,s.Uk)(" Y "),(0,s._)("a",{href:"",class:"text-blue-8"},"LA POLÍTICA DE PRIVACIDAD")],-1))),J=O((()=>(0,s._)("div",{class:"col-1 col-sm-4"},null,-1)));function G(e,o,t,a,r,i){const n=(0,s.up)("q-input"),c=(0,s.up)("q-icon"),d=(0,s.up)("q-checkbox"),u=(0,s.up)("q-btn"),p=(0,s.up)("q-form"),m=(0,s.up)("q-card-section"),h=(0,s.up)("q-card"),g=(0,s.up)("q-page"),f=(0,s.up)("q-page-container"),b=(0,s.up)("q-layout");return(0,s.wg)(),(0,s.j4)(b,{view:"lHh Lpr lFf",class:"bg-grey-2"},{default:(0,s.w5)((()=>[(0,s.Wm)(f,null,{default:(0,s.w5)((()=>[(0,s.Wm)(g,null,{default:(0,s.w5)((()=>[(0,s._)("div",I,[V,(0,s._)("div",U,[E,L,(0,s.Wm)(h,{flat:"",bordered:""},{default:(0,s.w5)((()=>[(0,s.Wm)(m,null,{default:(0,s.w5)((()=>[(0,s.Wm)(p,{class:"q-pa-lg",onSubmit:(0,l.iM)(i.login,["prevent"])},{default:(0,s.w5)((()=>[(0,s._)("div",T,[(0,s._)("div",R,[(0,s.Wm)(n,{outlined:"",modelValue:r.email,"onUpdate:modelValue":o[0]||(o[0]=e=>r.email=e),label:"Email",type:"email",required:""},null,8,["modelValue"])]),(0,s._)("div",D,[(0,s.Wm)(n,{outlined:"",modelValue:r.password,"onUpdate:modelValue":o[2]||(o[2]=e=>r.password=e),label:"Contraseña",type:r.typePassword?"password":"text",required:""},{append:(0,s.w5)((()=>[(0,s.Wm)(c,{onClick:o[1]||(o[1]=e=>r.typePassword=!r.typePassword),name:r.typePassword?"visibility":"visibility_off"},null,8,["name"])])),_:1},8,["modelValue","type"])]),(0,s._)("div",B,[(0,s.Wm)(d,{modelValue:r.remember,"onUpdate:modelValue":o[3]||(o[3]=e=>r.remember=e),class:"grey",label:"Recuérdame",size:"30px"},null,8,["modelValue"])]),(0,s._)("div",z,[(0,s.Wm)(u,{size:"22px",loading:r.loading,class:"full-width bold",color:"primary",label:"Iniciar Sesión",type:"submit","no-caps":""},null,8,["loading"])]),F,N])])),_:1},8,["onSubmit"])])),_:1})])),_:1}),M]),J])])),_:1})])),_:1})])),_:1})}t(9665);var H=t(7292);const X={name:"Login",data(){return{email:"",password:"",remember:!1,typePassword:!0,loading:!1,store:(0,H.A)()}},mounted(){this.store.isLoggedIn&&this.$router.push("/")},methods:{login(){this.loading=!0,this.$api.post("login",{email:this.email,password:this.password}).then((e=>{this.$q.notify({message:"Bienvenido",color:"positive",icon:"check_circle",position:"top"}),this.$router.push("/"),this.store.user=e.data.user,this.store.isLoggedIn=!0,this.$api.defaults.headers.common["Authorization"]="Bearer "+e.data.token,localStorage.setItem("tokenJor",e.data.token)})).catch((e=>{console.log(e),this.$q.notify({message:e.response.data.message,color:"negative",position:"top",timeout:2e3})})).finally((()=>{this.loading=!1}))}}};var Y=t(7605),K=t(2133),ee=t(8326),oe=t(6611),te=t(2857),le=t(1221);const ae=(0,c.Z)(X,[["render",G],["__scopeId","data-v-d35f83a8"]]),re=ae;function se(e,o,t,l,a,r){const i=(0,s.up)("q-btn"),n=(0,s.up)("q-icon"),c=(0,s.up)("q-input"),d=(0,s.up)("q-chip"),u=(0,s.up)("q-td"),p=(0,s.up)("q-img"),m=(0,s.up)("q-table"),h=(0,s.up)("q-page");return(0,s.wg)(),(0,s.j4)(h,null,{default:(0,s.w5)((()=>[(0,s.Wm)(m,{"virtual-scroll":"","virtual-scroll-item-size":48,"selected-rows-label":r.getSelectedString,selected:a.selected,"onUpdate:selected":o[2]||(o[2]=e=>a.selected=e),selection:"multiple",dense:"","rows-per-page-options":[15,100,150,500],rows:a.store.cupos,columns:a.cupoColumns,filter:a.cupoSearch},{"top-right":(0,s.w5)((()=>[(0,s.Wm)(i,{flat:"",round:"",dense:"",icon:"o_print",onClick:r.cupoPrint},null,8,["onClick"]),(0,s.Wm)(i,{flat:"",round:"",dense:"",icon:"refresh",onClick:o[0]||(o[0]=e=>{r.cupoGet(),a.cupoSearch=""})}),(0,s.Wm)(c,{dense:"",outlined:"",placeholder:"Buscar...",modelValue:a.cupoSearch,"onUpdate:modelValue":o[1]||(o[1]=e=>a.cupoSearch=e)},{prepend:(0,s.w5)((()=>[(0,s.Wm)(n,{name:"search"})])),_:1},8,["modelValue"])])),"body-cell-estado":(0,s.w5)((e=>[(0,s.Wm)(u,{props:e},{default:(0,s.w5)((()=>[(0,s.Wm)(d,{color:"Libre"==e.row.estado?"green":"red","text-color":"white",dense:""},{default:(0,s.w5)((()=>[(0,s.Uk)((0,f.zw)(e.row.estado),1)])),_:2},1032,["color"])])),_:2},1032,["props"])])),"body-cell-action":(0,s.w5)((e=>[(0,s.Wm)(u,{props:e},{default:(0,s.w5)((()=>[(0,s.Wm)(i,{flat:"",round:"",dense:"",icon:"qr_code",onClick:o=>r.qrPrint(e.row)},null,8,["onClick"]),(0,s.Wm)(i,{flat:"",round:"",dense:"",icon:"public",onClick:o=>r.cupoRegister(e.row)},null,8,["onClick"]),(0,s.Wm)(i,{flat:"",round:"",dense:"",icon:"recycling",onClick:o=>r.cupoReset(e.row)},null,8,["onClick"])])),_:2},1032,["props"])])),"body-cell-foto":(0,s.w5)((e=>[(0,s.Wm)(u,{props:e},{default:(0,s.w5)((()=>[(0,s.Wm)(p,{onClick:o=>r.fotoShow(e.row),src:a.url+"../imagenes/"+e.row.foto,width:"30px",height:"30px"},null,8,["onClick","src"])])),_:2},1032,["props"])])),_:1},8,["selected-rows-label","selected","rows","columns","filter"])])),_:1})}A()(X,"components",{QLayout:Y.Z,QPageContainer:K.Z,QPage:$.Z,QCard:S.Z,QCardSection:W.Z,QForm:ee.Z,QInput:oe.Z,QIcon:te.Z,QCheckbox:le.Z,QBtn:P.Z});t(4527);var ie=t(2316);t(196);const ne={name:"Cupo",data(){return{selected:[],url:"https://bjornada.siscenter.org/api/",cupoSearch:"",store:(0,H.A)(),cupoColumns:[{name:"action",label:"Acción",field:"action",align:"left",sortable:!0},{name:"id",label:"ID",field:"id",align:"left",sortable:!0},{name:"estado",label:"Estado",field:"estado",align:"left",sortable:!0},{name:"nombre",label:"Nombre",field:"nombre",align:"left",sortable:!0},{name:"carrera",label:"Carrera",field:"carrera",align:"left",sortable:!0},{name:"celular",label:"Celular",field:"celular",align:"left",sortable:!0},{name:"correo",label:"Correo",field:"correo",align:"left",sortable:!0},{name:"foto",label:"Foto",field:"foto",align:"left",sortable:!0}]}},created(){0===this.store.cupos.length&&this.cupoGet()},computed:{},methods:{qrPrint(e){ie.toDataURL("https://jornada.siscenter.org/#/registro/"+e.codigo).then((e=>{this.$q.dialog({title:"Código QR",message:`<div style="text-align: center"><img src="${e}" /></div>`,html:!0,ok:!1,cancel:{label:"Cerrar",color:"primary",flat:!0,noDismiss:!0}})})).catch((e=>{console.error(e)}))},cupoRegister(e){window.open("https://jornada.siscenter.org/#/registro/"+e.codigo,"_blank")},cupoReset(e){this.$q.dialog({title:"Confirmación",message:"¿Está seguro de resetear el cupo?",ok:{label:"Si",color:"primary",flat:!0,noDismiss:!0},cancel:{label:"No",color:"primary",flat:!0,noDismiss:!0}}).onOk((()=>{this.$api.put("cupo/"+e.id,{ci:"",nombres:"",apellidos:"",carrera:"",foto:"avatar.png",celular:"",direccion:"",correo:"",credencial:!1,folder:!1,barbijo:!1,certificado:!1}).then((e=>{console.log(e.data),this.$q.notify({message:"Cupo reseteado",color:"green-4",textColor:"white",icon:"check_circle",position:"top"}),this.cupoGet()})).catch((e=>{this.$q.notify({message:"Error al resetear el cupo",color:"red-4",textColor:"white",icon:"error",position:"top"})}))}))},cupoPrint:function(){if(this.selected.length<=0)return this.$q.notify({color:"red-4",textColor:"white",icon:"report_problem",position:"top",message:"No hay registros seleccionados"}),!1;this.$q.loading.show(),this.$api.post("cupoPdf",this.selected).then((e=>{console.log(e.data),window.open(this.url+"cupoFile","_blank"),this.$q.notify({color:"green-4",textColor:"white",icon:"check_circle",position:"top",message:"PDF generado"})})).catch((e=>{this.$q.notify({color:"red-4",textColor:"white",icon:"report_problem",position:"top",message:"Error al generar PDF"})})).finally((()=>{this.$q.loading.hide()}))},getSelectedString(){return 0===this.selected.length?"":`${this.selected.length} registro${this.selected.length>1?"s":""} seleccionados de ${this.store.cupos.length}`},fotoShow(e){this.$q.dialog({title:"Foto",message:'<img src="'+this.url+"../imagenes/"+e.foto+'" width="100%" />',html:!0,persistent:!0,ok:{label:"Cerrar",color:"primary"}})},cupoGet(){this.$q.loading.show(),this.store.cupos=[],this.$api.get("cupo").then((e=>{e.data.forEach((e=>{e.estado=null==e.nombres?"Libre":"Ocupado",e.nombre=(null==e.nombres?"":e.nombres)+" "+(null==e.apellidos?"":e.apellidos),this.store.cupos.push(e)}))})).catch((e=>{console.log(e)})).finally((()=>{this.$q.loading.hide()}))}}};var ce=t(7580),de=t(7220),ue=t(7691),pe=t(335);const me=(0,c.Z)(ne,[["render",se]]),he=me;A()(ne,"components",{QPage:$.Z,QTable:ce.Z,QBtn:P.Z,QInput:oe.Z,QIcon:te.Z,QTd:de.Z,QChip:ue.Z,QImg:pe.Z});const ge={key:0,class:"flex flex-center text-bold text-center text-h2 text-red-5"},fe={class:"row"},be={class:"col-12 col-sm-6 q-px-xs"},we={class:"col-12 col-sm-6 q-px-xs"},ve={class:"col-12 col-sm-6 q-px-xs"},qe={class:"col-12 col-sm-6 q-px-xs"},ye={class:"col-12 col-sm-6 q-px-xs"},_e={class:"col-12 col-sm-6 q-px-xs"},xe={class:"col-12 col-sm-6 q-px-xs"},Ce={class:"col-12 col-sm-12 q-px-xs flex flex-center q-pb-xs"},ke={class:"col-12 col-sm-12 q-px-xs"};function $e(e,o,t,a,r,i){const n=(0,s.up)("q-toolbar-title"),c=(0,s.up)("q-toolbar"),d=(0,s.up)("q-header"),u=(0,s.up)("q-input"),p=(0,s.up)("q-select"),m=(0,s.up)("q-uploader"),h=(0,s.up)("q-btn"),g=(0,s.up)("q-form"),f=(0,s.up)("q-page"),b=(0,s.up)("router-view"),w=(0,s.up)("q-page-container"),v=(0,s.up)("q-layout");return(0,s.wg)(),(0,s.j4)(v,{view:"lHh Lpr lFf",class:"bg-grey-2"},{default:(0,s.w5)((()=>[(0,s.Wm)(d,{class:"bg-grey-2"},{default:(0,s.w5)((()=>[(0,s.Wm)(c,null,{default:(0,s.w5)((()=>[(0,s.Wm)(n,{class:"text-bold text-primary text-center"},{default:(0,s.w5)((()=>[(0,s.Uk)(" Registro de estudiante ")])),_:1})])),_:1})])),_:1}),(0,s.Wm)(w,null,{default:(0,s.w5)((()=>[(0,s.Wm)(b,null,{default:(0,s.w5)((()=>[(0,s.Wm)(f,null,{default:(0,s.w5)((()=>[r.cupoBool?((0,s.wg)(),(0,s.iD)("div",ge," Este cupo ya fue registrado ")):((0,s.wg)(),(0,s.j4)(g,{key:1,class:"q-pa-lg",onSubmit:(0,l.iM)(i.cupoUpdate,["prevent"])},{default:(0,s.w5)((()=>[(0,s._)("div",fe,[(0,s._)("div",be,[(0,s.Wm)(u,{modelValue:r.cupo.ci,"onUpdate:modelValue":o[0]||(o[0]=e=>r.cupo.ci=e),label:"Carnet de identidad",outlined:"",required:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",we,[(0,s.Wm)(u,{required:"",modelValue:r.cupo.nombres,"onUpdate:modelValue":o[1]||(o[1]=e=>r.cupo.nombres=e),label:"Nombre",outlined:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",ve,[(0,s.Wm)(u,{modelValue:r.cupo.apellidos,"onUpdate:modelValue":o[2]||(o[2]=e=>r.cupo.apellidos=e),label:"Apellido",outlined:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",qe,[(0,s.Wm)(p,{modelValue:r.cupo.carrera,"onUpdate:modelValue":o[3]||(o[3]=e=>r.cupo.carrera=e),label:"Carrera",outlined:"",options:["SISTEMAS","INFORMATICA","CISCO","OTROS"],class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",ye,[(0,s.Wm)(u,{modelValue:r.cupo.celular,"onUpdate:modelValue":o[4]||(o[4]=e=>r.cupo.celular=e),label:"Celular",outlined:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",_e,[(0,s.Wm)(u,{modelValue:r.cupo.direccion,"onUpdate:modelValue":o[5]||(o[5]=e=>r.cupo.direccion=e),label:"Direccion",outlined:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",xe,[(0,s.Wm)(u,{modelValue:r.cupo.correo,"onUpdate:modelValue":o[6]||(o[6]=e=>r.cupo.correo=e),label:"Correo",type:"email",outlined:"",class:"q-mb-md"},null,8,["modelValue"])]),(0,s._)("div",Ce,[(0,s.Wm)(m,{accept:".jpg, .png",onAdded:i.uploadFile,"auto-upload":"","max-files":"1",label:"Subir foto",flat:"","max-file-size":"2000000",onRejected:i.onRejected,bordered:""},null,8,["onAdded","onRejected"])]),(0,s._)("div",ke,[(0,s.Wm)(h,{color:"primary",label:"Registrar","no-caps":"",type:"submit",icon:"add_circle_outline",class:"full-width"})])])])),_:1},8,["onSubmit"]))])),_:1})])),_:1})])),_:1})])),_:1})}const Se={name:"Registro",data(){return{cupoBool:!0,cupo:{ci:"",nombres:"",apellidos:"",carrera:"",celular:"",direccion:"",correo:"",foto:""},foto:"",codigo:this.$route.params.id}},mounted(){this.$q.loading.show(),this.$api.get(`cupo/${this.codigo}`).then((e=>{this.cupo=e.data,null==this.cupo.nombres&&(this.cupoBool=!1)})).finally((()=>{this.$q.loading.hide()}))},methods:{onRejected(e){this.$q.notify({type:"negative",message:`${e.length} el archivo paso las restricciones de validación`})},uploadFile(e){let o=this.$q.dialog({message:"Subiendo... 0%"}),t=0;const l=new FormData;return l.append("file",e[0]),new Promise(((a,r)=>{this.$api.post("upload",l,{headers:{"Content-Type":"multipart/form-data"},onUploadProgress:e=>{t=Math.round(e.loaded/e.total*100),o.update({message:`Subiendo... ${t}%`}),t>=100&&o.hide()}}).then((o=>{this.foto=o.data,a(e)})).catch((e=>r(e)))}))},cupoUpdate(){if(""==this.foto)return this.$q.notify({message:"Tienes que subir una foto",type:"negative",icon:"warning",position:"top"}),!1;this.$q.dialog({title:"Confirmación",message:"¿Estas seguro de registrar este cupo?",cancel:!0,persistent:!0}).onOk((()=>{this.$q.loading.show(),this.cupo.foto=this.foto,this.$api.put(`cupo/${this.cupo.id}`,this.cupo).then((e=>{console.log(e.data),this.$q.notify({message:"Cupo registrado",color:"positive",icon:"check_circle",position:"top"}),this.cupoBool=!0})).finally((()=>{this.$q.loading.hide()}))}))}}};var We=t(6602),Pe=t(1663),Ze=t(1973),Ae=t(6384),je=t(4343);const Qe=(0,c.Z)(Se,[["render",$e]]),Oe=Qe;A()(Se,"components",{QLayout:Y.Z,QHeader:We.Z,QToolbar:Pe.Z,QToolbarTitle:Ze.Z,QPageContainer:K.Z,QPage:$.Z,QForm:ee.Z,QInput:oe.Z,QSelect:Ae.Z,QUploader:je.Z,QBtn:P.Z});const Ie=[{path:"/",component:()=>Promise.all([t.e(736),t.e(690)]).then(t.bind(t,2690)),children:[{path:"",component:Q,meta:{requiresAuth:!0}},{path:"cupo",component:he,meta:{requiresAuth:!0}}]},{path:"/login",component:re},{path:"/registro/:id",component:Oe,meta:{requiresAuth:!0}},{path:"/:catchAll(.*)*",component:()=>t.e(862).then(t.bind(t,1862))}],Ve=Ie,Ue=(0,p.BC)((function(){const e=g.r5,o=(0,g.p7)({scrollBehavior:()=>({left:0,top:0}),routes:Ve,history:e("")});return o.beforeEach(((e,o,t)=>{if(e.matched.some((e=>e.meta.requiresAuth))){if((0,H.A)().isLoggedIn)return void t();t("/login")}else t()})),o}));async function Ee(e,o){const t=e(u);t.use(a.Z,o);const l="function"===typeof h?await h({}):h;t.use(l);const s=(0,r.Xl)("function"===typeof Ue?await Ue({store:l}):Ue);return l.use((({store:e})=>{e.router=s})),{app:t,store:l,router:s}}var Le=t(8934),Te=t(6827),Re=t(6950),De=t(7975);const Be={config:{},lang:Le.Z,plugins:{Notify:Te.Z,Loading:Re.Z,Dialog:De.Z}};var ze=t(368);(0,ze.z)("service-worker.js",{ready(){},registered(){},cached(){},updatefound(){},updated(){},offline(){},error(){}}),/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream&&window.navigator.standalone&&t.e(736).then(t.t.bind(t,4848,23));const Fe="";async function Ne({app:e,router:o,store:t},l){let a=!1;const r=e=>{try{return o.resolve(e).href}catch(t){}return Object(e)===e?null:e},s=e=>{if(a=!0,"string"===typeof e&&/^https?:\/\//.test(e))return void(window.location.href=e);const o=r(e);null!==o&&(window.location.href=o,window.location.reload())},i=window.location.href.replace(window.location.origin,"");for(let c=0;!1===a&&c<l.length;c++)try{await l[c]({app:e,router:o,store:t,ssrContext:null,redirect:s,urlPath:i,publicPath:Fe})}catch(n){return n&&n.url?void s(n.url):void console.error("[Quasar] boot error:",n)}!0!==a&&(e.use(o),e.mount("#q-app"))}Ee(l.ri,Be).then((e=>{const[o,l]=void 0!==Promise.allSettled?["allSettled",e=>e.map((e=>{if("rejected"!==e.status)return e.value.default;console.error("[Quasar] boot error:",e.reason)}))]:["all",e=>e.map((e=>e.default))];return Promise[o]([Promise.resolve().then(t.bind(t,1569))]).then((o=>{const t=l(o).filter((e=>"function"===typeof e));Ne(e,t)}))}))},1569:(e,o,t)=>{t.r(o),t.d(o,{api:()=>i,default:()=>n});t(9665);var l=t(3340),a=t(9981),r=t.n(a),s=t(7292);const i=r().create({baseURL:"https://bjornada.siscenter.org/api/"}),n=(0,l.xr)((({app:e,router:o})=>{e.config.globalProperties.$axios=r(),e.config.globalProperties.$api=i;const t=localStorage.getItem("tokenJor");t?(e.config.globalProperties.$api.defaults.headers.common["Authorization"]="Bearer "+t,e.config.globalProperties.$api.post("me").then((e=>{(0,s.A)().user=e.data,(0,s.A)().isLoggedIn=!0})).catch((t=>{e.config.globalProperties.$api.defaults.headers.common["Authorization"]="",(0,s.A)().user={},localStorage.removeItem("tokenJor"),(0,s.A)().isLoggedIn=!1,o.push("/login")}))):(o.push("/login"),(0,s.A)().user={},localStorage.removeItem("tokenJor"),(0,s.A)().isLoggedIn=!1)}))},7292:(e,o,t)=>{t.d(o,{A:()=>a});var l=t(1809);const a=(0,l.Q_)("counter",{state:()=>({counter:0,user:{},isLoggedIn:!!localStorage.getItem("tokenJor"),cupo:{},cupos:[]}),getters:{doubleCount:e=>2*e.counter},actions:{increment(){this.counter++}}})}},o={};function t(l){var a=o[l];if(void 0!==a)return a.exports;var r=o[l]={exports:{}};return e[l].call(r.exports,r,r.exports,t),r.exports}t.m=e,(()=>{var e=[];t.O=(o,l,a,r)=>{if(!l){var s=1/0;for(d=0;d<e.length;d++){for(var[l,a,r]=e[d],i=!0,n=0;n<l.length;n++)(!1&r||s>=r)&&Object.keys(t.O).every((e=>t.O[e](l[n])))?l.splice(n--,1):(i=!1,r<s&&(s=r));if(i){e.splice(d--,1);var c=a();void 0!==c&&(o=c)}}return o}r=r||0;for(var d=e.length;d>0&&e[d-1][2]>r;d--)e[d]=e[d-1];e[d]=[l,a,r]}})(),(()=>{t.n=e=>{var o=e&&e.__esModule?()=>e["default"]:()=>e;return t.d(o,{a:o}),o}})(),(()=>{var e,o=Object.getPrototypeOf?e=>Object.getPrototypeOf(e):e=>e.__proto__;t.t=function(l,a){if(1&a&&(l=this(l)),8&a)return l;if("object"===typeof l&&l){if(4&a&&l.__esModule)return l;if(16&a&&"function"===typeof l.then)return l}var r=Object.create(null);t.r(r);var s={};e=e||[null,o({}),o([]),o(o)];for(var i=2&a&&l;"object"==typeof i&&!~e.indexOf(i);i=o(i))Object.getOwnPropertyNames(i).forEach((e=>s[e]=()=>l[e]));return s["default"]=()=>l,t.d(r,s),r}})(),(()=>{t.d=(e,o)=>{for(var l in o)t.o(o,l)&&!t.o(e,l)&&Object.defineProperty(e,l,{enumerable:!0,get:o[l]})}})(),(()=>{t.f={},t.e=e=>Promise.all(Object.keys(t.f).reduce(((o,l)=>(t.f[l](e,o),o)),[]))})(),(()=>{t.u=e=>"js/"+e+"."+{690:"088463fa",862:"e7e5d553"}[e]+".js"})(),(()=>{t.miniCssF=e=>"css/"+{143:"app",736:"vendor"}[e]+"."+{143:"125f1a42",736:"4cde08dd"}[e]+".css"})(),(()=>{t.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"===typeof window)return window}}()})(),(()=>{t.o=(e,o)=>Object.prototype.hasOwnProperty.call(e,o)})(),(()=>{var e={},o="front:";t.l=(l,a,r,s)=>{if(e[l])e[l].push(a);else{var i,n;if(void 0!==r)for(var c=document.getElementsByTagName("script"),d=0;d<c.length;d++){var u=c[d];if(u.getAttribute("src")==l||u.getAttribute("data-webpack")==o+r){i=u;break}}i||(n=!0,i=document.createElement("script"),i.charset="utf-8",i.timeout=120,t.nc&&i.setAttribute("nonce",t.nc),i.setAttribute("data-webpack",o+r),i.src=l),e[l]=[a];var p=(o,t)=>{i.onerror=i.onload=null,clearTimeout(m);var a=e[l];if(delete e[l],i.parentNode&&i.parentNode.removeChild(i),a&&a.forEach((e=>e(t))),o)return o(t)},m=setTimeout(p.bind(null,void 0,{type:"timeout",target:i}),12e4);i.onerror=p.bind(null,i.onerror),i.onload=p.bind(null,i.onload),n&&document.head.appendChild(i)}}})(),(()=>{t.r=e=>{"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}})(),(()=>{t.p=""})(),(()=>{var e={143:0};t.f.j=(o,l)=>{var a=t.o(e,o)?e[o]:void 0;if(0!==a)if(a)l.push(a[2]);else{var r=new Promise(((t,l)=>a=e[o]=[t,l]));l.push(a[2]=r);var s=t.p+t.u(o),i=new Error,n=l=>{if(t.o(e,o)&&(a=e[o],0!==a&&(e[o]=void 0),a)){var r=l&&("load"===l.type?"missing":l.type),s=l&&l.target&&l.target.src;i.message="Loading chunk "+o+" failed.\n("+r+": "+s+")",i.name="ChunkLoadError",i.type=r,i.request=s,a[1](i)}};t.l(s,n,"chunk-"+o,o)}},t.O.j=o=>0===e[o];var o=(o,l)=>{var a,r,[s,i,n]=l,c=0;if(s.some((o=>0!==e[o]))){for(a in i)t.o(i,a)&&(t.m[a]=i[a]);if(n)var d=n(t)}for(o&&o(l);c<s.length;c++)r=s[c],t.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return t.O(d)},l=globalThis["webpackChunkfront"]=globalThis["webpackChunkfront"]||[];l.forEach(o.bind(null,0)),l.push=o.bind(null,l.push.bind(l))})();var l=t.O(void 0,[736],(()=>t(2661)));l=t.O(l)})();