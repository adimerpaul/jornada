<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('paquetes')->insert([
            ['id'=>1,'nombre'=>'PAQUETE 1','descripcion'=>'Ingeniería de Sistemas, Sociedad y Tecnología'],
            ['id'=>2,'nombre'=>'PAQUETE 2','descripcion'=>'Vision por computador e Inteligencia Artificial'],
            ['id'=>3,'nombre'=>'PAQUETE 3','descripcion'=>'Informática y Ciberseguridad'],
        ]);

        DB::table('conferencias')->insert([
            ['id'=>1,'codigo'=>'C1','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Marcos Darío Aranda','pais'=>'Argentina','tema'=>'Visión Artificial: Tecnologías para la Transformación Digital con YOLO y Deep Learning'],
            ['id'=>2,'codigo'=>'C2','tipo'=>'CONFERENCIA','ponente'=>'Lic. Juan Pablo Moreno','pais'=>'Argentina','tema'=>'Firmware Inteligente, Hardware Intercambiable: Claves para un IoT Sustentable'],
            ['id'=>3,'codigo'=>'C3','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Juan José Oré Cerrón','pais'=>'Peru','tema'=>'Reconstrucción 3D de Sitios Arqueológicos: Aplicaciones y Beneficios'],
            ['id'=>4,'codigo'=>'C4','tipo'=>'CONFERENCIA','ponente'=>'Ph.D. Marisol Téllez Ramírez','pais'=>'Bolivia','tema'=>'Robótica Educativa y Pensamiento Computacional: Formando las Mentes del Futuro'],
            ['id'=>5,'codigo'=>'C5','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Ibar Mario Vasquez','pais'=>'Bolivia','tema'=>'De un simple clic, a un gran riesgo — Comprometiendo la Privacidad de la Víctima en un solo clic - Anatomía Técnica de un Enlace Malicioso.'],
            ['id'=>6,'codigo'=>'C6','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Marco Antonio Avendaño','pais'=>'Bolivia','tema'=>'Scrum: El arte de la Entrega Continua de Valor'],
            ['id'=>7,'codigo'=>'C7','tipo'=>'CONFERENCIA','ponente'=>'Ph.D. Esteban Saavedra Lopez','pais'=>'Bolivia','tema'=>'Blockchain a Gran Escala: Preparando Empresas para el Futuro Digital'],
            ['id'=>8,'codigo'=>'C8','tipo'=>'CONFERENCIA','ponente'=>'Ing. Ramiro Bernal','pais'=>'Bolivia','tema'=>'El Estado del Arte en Modelos de Simulación: Avances y Desafíos'],
            ['id'=>9,'codigo'=>'C9','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Remy Kenier Monzón Fuentes','pais'=>'Bolivia','tema'=>'Gobernanza y Cumplimiento de TI en el Órgano Judicial: Administración de Sistemas de Información y Servicios Tecnológicos en el Distrito de Oruro'],
            ['id'=>10,'codigo'=>'C10','tipo'=>'CONFERENCIA','ponente'=>'Esp. Ing. Hernán Helguero','pais'=>'Bolivia','tema'=>'Visión por Computador aplicado a la Medicina'],
            ['id'=>11,'codigo'=>'C11','tipo'=>'CONFERENCIA','ponente'=>'Dr. Ing. Rosario Maribel Teran Mejia','pais'=>'Bolivia/EEUU','tema'=>'	Conectividad Funcional Cerebral como Biomarcador Computacional: Aplicaciones en Neuromodulación de Enfermedades Neurológicas'],
            ['id'=>12,'codigo'=>'C12','tipo'=>'CONFERENCIA','ponente'=>'Ph.D. Benjamin H. Brinkmann','pais'=>'EEUU','tema'=>'Digital Health in Epilepsy - Remote Monitoring, Seizure Forecasting, and Targeted Therapy'],
            ['id'=>13,'codigo'=>'C13','tipo'=>'CONFERENCIA','ponente'=>'Ing. Gonzalo Nina Mamani','pais'=>'Bolivia/Panamá','tema'=>'¿Quién te está siguiendo ahora?'],
            ['id'=>14,'codigo'=>'C14','tipo'=>'CONFERENCIA','ponente'=>'M.B.A. Ing. Ronald Huanca Calle','pais'=>'Bolivia','tema'=>'Planificación Minera 4.0: Simulación Dinámica para Decisiones Estratégicas en Operaciones de Concentración de estaño'],
            ['id'=>15,'codigo'=>'C15','tipo'=>'CONFERENCIA','ponente'=>'Ph.D. Manuel Herrera','pais'=>'Reino Unido','tema'=>'Redes Neuronales Informadas por la Física: Hacia una IA Confiable para la Modelación de Inundaciones'],
            ['id'=>16,'codigo'=>'C16','tipo'=>'CONFERENCIA','ponente'=>'Ph.D. Alfredo Soliz Gamboa','pais'=>'Brasil/Bolivia','tema'=>'Cuando los Datos Esconden Secretos y Las Máquinas Piensan al Revés'],
            ['id'=>17,'codigo'=>'C17','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Evelyn Kathya Torrez Ossio','pais'=>'Bolivia','tema'=>'Datos Limpios, Decisiones Claras: Una Mirada Desde la Gestión'],
            ['id'=>18,'codigo'=>'C18','tipo'=>'CONFERENCIA','ponente'=>'M.Sc. Ing. Pavel Alvaro Ajata','pais'=>'Bolivia','tema'=>'Seguridad Informática en la Era de la IA: Una Herramienta de Doble Filo'],
            ['id'=>19,'codigo'=>'C19','tipo'=>'CONFERENCIA','ponente'=>'Ing. Grevy Guzman','pais'=>'España/Bolivia','tema'=>'Automatización de procesos en Azure Devops'],
            ['id'=>20,'codigo'=>'C20','tipo'=>'CONFERENCIA','ponente'=>'Ing. Daniel Adolfo Blanco Adrian','pais'=>'Bolivia','tema'=>'El Potencial de los Modelos de Lenguaje con RAG (Retrieval-Augmented Generation) para la Gestión del Conocimiento y la Inteligencia Organizacional'],
            ['id'=>21,'codigo'=>'C21','tipo'=>'CONFERENCIA','ponente'=>'M.Sc.Ing. David Morales Vega','pais'=>'Bolivia','tema'=>'El Viaje del Arquitecto: Construyendo un Sistema Empresarial para el Mundo Real'],
            ['id'=>22,'codigo'=>'TA1','tipo'=>'TALLER','ponente'=>'M.Sc.Ing.Marco Antonio Avendaño','pais'=>'Bolivia','tema'=>' de Scrum: Construyendo Productos de manera Iterativa e Incremental'],
            ['id'=>23,'codigo'=>'TA2','tipo'=>'TALLER','ponente'=>'Ph.D. Esteban Saavedra Lopez','pais'=>'Bolivia','tema'=>'Desarrolla tu propio Asistente con IA/SmartOps: Gestión Inteligente de Infraestructura IT'],
            ['id'=>24,'codigo'=>'TA3','tipo'=>'TALLER','ponente'=>'M.Sc. Ing. Alison Orellana Rios','pais'=>'Bolivia','tema'=>'Visión Artificial para el Reconocimiento y Análisis de Datos Visuales'],
            ['id'=>25,'codigo'=>'TA4','tipo'=>'TALLER','ponente'=>'Ing. Grevy Guzman','pais'=>'España/Bolivia','tema'=>'Microsoft.Extensions.AI, mi primer Chat en .NET'],
            ['id'=>26,'codigo'=>'TA5','tipo'=>'TALLER','ponente'=>'M.Sc.Ing. David Morales Vega','pais'=>'Bolivia','tema'=>'Decisiones Inteligentes: Construye una Aplicación de IA para Analizar Datos Empresariales'],
            ['id'=>27,'codigo'=>'TA6','tipo'=>'TALLER','ponente'=>'Ing. Edmar Perez Villarroel','pais'=>'Bolivia','tema'=>'Inteligencia Artificial Aplicada a la Ciberseguridad de Redes Corporativas, estrategias de Mitigación de Amenazas en Redes Empresariales Potenciadas por Inteligencia Artificial'],
            ['id'=>28,'codigo'=>'TA7','tipo'=>'TALLER','ponente'=>'M.Sc. Ing. Pavel Alvaro Ajata','pais'=>'Bolivia','tema'=>'Inteligencia Artificial y Seguridad Informática: Una Herramienta de Doble Filo'],
        ]);

        DB::table('conferencia_paquete')->insert([
            ['paquete_id'=>1,'conferencia_id'=>6],
            ['paquete_id'=>1,'conferencia_id'=>8],
            ['paquete_id'=>1,'conferencia_id'=>9],
            ['paquete_id'=>1,'conferencia_id'=>14],
            ['paquete_id'=>1,'conferencia_id'=>17],
            ['paquete_id'=>1,'conferencia_id'=>16],
            ['paquete_id'=>1,'conferencia_id'=>19],
            ['paquete_id'=>1,'conferencia_id'=>22],
            ['paquete_id'=>1,'conferencia_id'=>26],

            ['paquete_id'=>2,'conferencia_id'=>1],
            ['paquete_id'=>2,'conferencia_id'=>4],
            ['paquete_id'=>2,'conferencia_id'=>10],
            ['paquete_id'=>2,'conferencia_id'=>11],
            ['paquete_id'=>2,'conferencia_id'=>12],
            ['paquete_id'=>2,'conferencia_id'=>15],
            ['paquete_id'=>2,'conferencia_id'=>20],
            ['paquete_id'=>2,'conferencia_id'=>24],
            ['paquete_id'=>2,'conferencia_id'=>25],

            ['paquete_id'=>3,'conferencia_id'=>5],
            ['paquete_id'=>3,'conferencia_id'=>13],
            ['paquete_id'=>3,'conferencia_id'=>18],
            ['paquete_id'=>3,'conferencia_id'=>2],
            ['paquete_id'=>3,'conferencia_id'=>7],
            ['paquete_id'=>3,'conferencia_id'=>3],
            ['paquete_id'=>3,'conferencia_id'=>21],
            ['paquete_id'=>3,'conferencia_id'=>23],


        ]);

    }
}
