<template>

<div class="wrapper wrapper-content animated fadeInRight">
  <form  @submit.prevent="createRoadMap">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>1° Hoja de Ruta *</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Datos Hoja de Ruta.</p>
                                    <div class="form-group">
                                      <label for="">Razón:</label>                                                  
                                        <input v-model="derivativeRoadmap.reason" type="text" class="form-control" placeholder="razón">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Descripción</label>                                                                              
                                      <textarea v-model="derivativeRoadmap.description" name="descrption" class="form-control" id="" placeholder="descripción" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>2° Dirigido *</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <p>Derivar la hoja de ruta.</p>
                                <div class="form-group">                                
                                    <label for="" class="col-lg-2 control-label">Dirección</label>
                                    <div class="col-lg-10">
                                        <v-select  v-model="derivativeRoadmap.direction" label="text" :options="optionsDirection"></v-select>
                                    
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <label for="" class="col-lg-2 control-label">Unidad</label>
                                    <div class="col-lg-10">     
                                        <v-select v-model="derivativeRoadmap.unit" label="text" :options="optionsUnit"></v-select>                                  
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <label for="" class="col-lg-2 control-label">Cargo</label>
                                    <div class="col-lg-10">
                                        <v-select v-model="derivativeRoadmap.position" label="text" :options="optionsPosition"></v-select>                                                                                              
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <label for="" class="col-lg-2 control-label">Usuario</label>
                                    <div class="col-lg-10">
                                        <v-select v-model="derivativeRoadmap.receiver" label="text" :options="optionsUser"></v-select>                                                                                              
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>3° Accion y Finalizar
                                <small>accion que se recomienda al destinatario</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="col-md-6">                                
                                    <div class="form-group">                                        
                                        <label for="" class="col-lg-2 control-label">Accion</label>
                                        <div class="col-lg-10">                                          

                                            <!-- select name="" id="" v-model="derivativeRoadmap.action_id">
                                                <option value="" v-for="actRdm in actionsRoadMap" :key="actRdm"></option>
                                            </select> -->
                                            <v-select v-model="derivativeRoadmap.action" label="text" :options="actionsRoadMap"></v-select>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                  <input type="submit" class="btn btn-primary" value="Crear Hoja de Ruta">      
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>
  
</template>

<script>
import  Vue from 'vue'

import vSelect from 'vue-select'

import axios from 'axios'

Vue.component('v-select', vSelect)

export default {

  name: 'FormCreateRoadMap',
  props: ['Directions','Units','Positions', 'Actions', 'Users'  ],

  mounted() {
   /*  let optionsArray = [];
    this.Directions.forEach((item) => {

        optionsArray.push('{ label:'+ item.label+' }')
        this.myVariable = true; 
        // do something
    }); */
  },

  data () {

   	return {
        derivativeRoadmap: {
        'id': '',
        'roadmap_origin_id': '',
        'type_id': '',
        'direction': '',
        'unit': '',
        'status': '',
        'reason': '',
        'description': '',
        'code_direction': '',
        'action': '',
        'receiver': '',
        'position': ''
        },
        optionsDirection : this.Directions,
        optionsUnit : this.Units,
        optionsPosition: this.Positions,
        optionsUser: this.Users,
        actionsRoadMap: this.Actions,
    }
  },
 
  watch : {

  },

  methods: {

    createRoadMap(){

        axios.post('/RoadMap', this.derivativeRoadmap)
        .then(res => {
          console.log("Hoja de Ruta  creada correctamente")
        })
        .catch(err => console.log(err))

    },


    getDirections(){
        
    },
    getUnits(){

    },
    getPositions(){

    },  
    

  }
}
</script>

