<template>
  <div>
    <datatable v-bind="$data">
    </datatable>
    <!-- modal para crear la direccion -->
    <div class="modal inmodal in" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <i class="fa fa-laptop modal-icon"></i>
                    <h4 class="modal-title">Dirección</h4>
                    <small class="font-bold">
                      Seccion para crear una dirección
                    </small>
                </div>
              <form class="form-horizontal" v-on:submit="createDirection">
                <div class="modal-body">
                    <div class="ibox float-e-margins">
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Direccion</label>
                        <div class="col-lg-10">
                          <input type="text" v-model="direction.name" placeholder="Nombre de Direccion" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Descripción</label>
                        <div class="col-lg-10">
                          <textarea type="text" v-model="direction.description" placeholder="Descripcion" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="store-direction">Guardar</button>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import Vue from 'vue'
import Datatable from 'vue2-datatable-component'
import mockData from '../_mockData'
import components from './comps/'
Vue.use(Datatable)

export default {
  components,
  name: 'DirectionsTable',
  props: ['row'],
  data () {
    const amINestedComp = !!this.row

    return {
      direction: {
        name: '',
        description: ''
      },
      supportBackup: true,
      supportNested: true,
      tblClass: 'table-bordered',
      tblStyle: 'color: #666',
      pageSizeOptions: [5, 10, 15, 20],
      columns: (() => {
        const cols = [
          { title: 'ID', field: 'id', label: 'Direction ID', sortable: true, visible: 'true' },
          { title: 'Name', field: 'name', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Description', field: 'description', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Operation', tdComp: 'Opt', visible: 'true' }
        ]
        const groupsDef = {
          Normal: [],
          Sortable: ['ID'],
          Extra: []
        }
        return cols.map(col => {
          Object.keys(groupsDef).forEach(groupName => {
            if (groupsDef[groupName].includes(col.title)) {
              col.group = groupName
            }
          })
          return col
        })
      })(),
      data: [],
      total: 0,
      selection: [],
      summary: {},
      query: amINestedComp ? { uid: this.row.friends } : {},
      xprops: {
        eventbus: new Vue()
      }
    }
  },
  watch: {
    query: {
      handler () {
        this.handleQueryChange()
      },
      deep: true
    }
  },
  methods: {
    handleQueryChange () {
      axios.get('/directions_get_all', {
        params: this.query
      }).then(response => {
          this.data = response.data.directions
          this.total = response.data.total
        }).catch(err => {
          console.log(err)
        })
    },
    createDirection () {
      axios.post('/direction_create', this.direction)
        .then(res => {
          console.log("Direccion creada correctamente")
        })
        .catch(err => console.log(err))
    }
  }
}
</script>
<style>
.w-240 {
  width: 240px;
}
</style>
