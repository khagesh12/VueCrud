<template>
  <div class="ui three column grid">
    <div class="column">
      <div class="ui segment">
        <img class="ui small image" :src="image" />
        <h3 class="ui header">Name: {{ name | properCase }}</h3>
        <select @change="update">
          <option
            v-for="col in ['red', 'green', 'blue']"
            :value="col"
            :key="col"
            :selected="col === color ? 'selected' : ''"
          >{{ col | properCase }}</option>
        </select>
        <button @click="del" class="ui button red">
          <i class="trash icon"></i>
        </button>
      </div>
    </div>
    <div class="column"></div>
    <div class="column"></div>
  </div>
</template>
<script>
export default {
  name: "crud-component",

  computed: {
    image() {
      return `/images/${this.color}.jpg`;
    }
  },

  methods: {
    update(val) {
      this.$emit("update", this.id, val.target.selectedOptions[0].value);
    },

    del() {
      this.$emit("delete", this.id);
    }
  },
  props: ["id", "color", "name"],
  filters: {
    properCase(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  }
};
</script>
<style scoped>
</style>