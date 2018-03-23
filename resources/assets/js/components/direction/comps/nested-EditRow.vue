<template>
  <div class="-nested-dsp-row-comp">
    <button class="btn btn-xs btn-link -nested-dsp-row-close-btn"
      @click="nested.$toggle(false)">
      <i class="fa fa-times fa-lg"></i> <strong>Cerrar</strong>
    </button>
    <div class="ibox-content col-sm-8 col-sm-offset-2">
      <h3 class="m-t-none m-b">Editar Dirección</h3>
      
      <form class="form-horizontal" v-on:submit="updateDirection">
        <div class="form-group">
          <label class="col-lg-2 control-label">Nombre </label>
          <div class="col-lg-10">
            <input type="text" v-model="direction.name" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Descripción </label>
          <div class="col-lg-10">
            <input type="text" v-model="direction.description" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-sm btn-warning pull-right m-t-n-xs" type="submit">
              <strong>Guardar Cambios</strong>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props: ['row', 'nested'],
  data () {
    return {
      direction: {
        name: this.row.name,
        description: this.row.description
      }
    }
  },
  methods: {
    updateDirection () {
      let uri = `/direction_update/${this.row.id}`;
      axios.patch(uri, this.direction)
        .then((response) => {
          console.log("Direccion actualizada")
        })
        .catch(err => console.log("Error al actualizar direccion"))
      
    }
  }
}
</script>
<style>
.-nested-dsp-row-comp {
  position: relative;
  padding: 10px;
}
.-nested-dsp-row-close-btn {
  position: absolute;
  top: 5px;
  right: 5px;
}
</style>
