<template>

<div class="wrapper wrapper-content animated fadeInRight">
  <form @submit.prevent="deriveRoadMap">
            <div class="row">
                <div class="col-lg-12">
                   
                        
                            <div class="form-horizontal">
                                <p>Derivar la hoja de ruta.</p>
                                <div class="form-group">                                
                                    <label for="" class="col-lg-2 control-label">Dirección</label>
                                    <div class="col-lg-10">
                                        <v-select  v-model="derivativeRoadmap.direction_id" label="text" :options="optionsDirection"></v-select>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <label for="" class="col-lg-2 control-label">Unidad</label>
                                    <div class="col-lg-10">                                      
                                    <v-select  v-model="derivativeRoadmap.unit_id" label="text" :options="optionsUnit"></v-select>

                                    </div>
                                </div>
                                 <div class="form-group">                                    
                                    <label for="" class="col-lg-2 control-label">Cargo</label>
                                    <div class="col-lg-10">
                                      <v-select  v-model="derivativeRoadmap.position_id" label="text" :options="optionsPosition"></v-select>
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
            <div class="row">
                <div class="col-lg-12">
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="col-md-8">                                
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
                                  <input type="submit" class="btn btn-primary" value="Derivar Hoja de Ruta">                                  
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

  name: 'FormDeriveRoadMap',
  props: ['Directions','Units','Positions', 'Actions', 'Users', 'Roadmap_id'  ],


  mounted() {
        this.getDirections();
          console.log('Component mounted form mi first component form vue xD.');
  },

  data () {
    //const amINestedComp = !!this.row

   	return {
      derivativeRoadmap: {
        'id': '',
        'roadmap_id': this.Roadmap_id,
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
        actionsRoadMap: this.Actions
      }
  },

  methods: {
    getDirections(){
        
    },
    getUnits(){

    },
    getPositions(){

    },  
  	deriveRoadMap () {
      axios.post('/derive', this.derivativeRoadmap)
        .then(res => {
          console.log("hoja de ruta  creada correctamente");
        })
        .catch(err => console.log('error',err));
    }
    

  }
}
</script>

