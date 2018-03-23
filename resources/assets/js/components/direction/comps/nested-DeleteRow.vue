<template>
  <div class="-nested-dsp-row-comp">
    <button class="btn btn-xs btn-link -nested-dsp-row-close-btn"
      @click="nested.$toggle(false)">
      <i class="fa fa-times fa-lg"></i> <strong>Cerrar</strong>
    </button>
    <div class="ibox-content col-sm-8 col-sm-offset-2">
      <h3 class="m-t-none m-b">Usted está seguro(a)</h3>
      <form v-on:submit="deleteDirection">
        <button class="btn btn-sm btn-danger m-t-n-xs" type="submit">
          <strong>Eliminar Dirección</strong>
        </button>
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
    deleteDirection () {
      let uri = `/direction_delete/${this.row.id}`;
      axios.delete(uri)
        .then(response => {
          console.log("Direccion Eliminada")
        })
        .catch(err => console.log("Error al eliminar direccion"))
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
