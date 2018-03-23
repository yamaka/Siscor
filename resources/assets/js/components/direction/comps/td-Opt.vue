<template>
  <div class="btn-group btn-group-sm">
    <button class="btn btn-primary" title="Ver Dirección"
      :class="{ '-nested-comp-open-btn': isDisplayRowVisible }"
      @click="toggleNestedComp('DisplayRow')">
      <i class="fa fa-eye"></i> <span> Ver</span>
    </button>
    <button class="btn btn-primary" title="Editar Dirección"
      :class="{ '-nested-comp-open-btn': isEditVisible }"
      @click="toggleNestedComp('EditRow')">
      <i class="fa fa-edit"></i> Editar 
    </button>
    <button class="btn btn-primary" title="Eliminar Dirección"
      :class="{ '-nested-comp-open-btn': isDeleteVisible }"
      @click="toggleNestedComp('DeleteRow')">
      <i class="fa fa-remove"></i> Eliminar 
    </button>
  </div>
</template>
<script>

export default {
  props: ['row', 'nested'],
  mounted () {
    console.log(jQuery(this.$el).find('button[title]').tooltip());
    jQuery(this.$el).find('button[title]').tooltip();
  },
  computed: {
    isDisplayRowVisible () {
      if (this.nested.comp !== 'DisplayRow') return
      return this.nested.visible
    },
    isEditVisible () {
      if (this.nested.comp !== 'EditRow') return
      return this.nested.visible
    },
    isDeleteVisible () {
      if (this.nested.comp !== 'DeleteRow') return
      return this.nested.visible
    }
  },
  methods: {
    toggleNestedComp (comp) {
      const { nested } = this
      if (nested.comp === comp) return nested.$toggle()
      nested.$toggle(comp, true)
    }
  }
}
</script>
<style>
.-nested-comp-open-btn {
  color: black !important;
  background-color: #ffffff !important;
}
</style>
