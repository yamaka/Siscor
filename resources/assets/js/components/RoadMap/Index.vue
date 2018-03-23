<template>
  <div>
    <datatable v-bind="$data"></datatable>
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
  name: 'RoadMapsTable',
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
          { title: 'ID', field: 'id', label: 'RoadMap ID', sortable: true, visible: 'true' },
          { title: 'Estado', field: 'status', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Razón', field: 'reason', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Descripción', field: 'description', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Operación', tdComp: 'Opt', visible: 'true' }
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
      axios.get('roadmaps_get_all', {
        params: this.query
      }).then(response => {
          this.data = response.data.roadmaps
          this.total = response.data.total
        }).catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
<style>
.w-240 {
  width: 240px;
}
</style>
