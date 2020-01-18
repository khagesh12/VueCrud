<template>
  <div id="root">
    <div class="ui container">
      <h1 class="ui header">Cruds</h1>

      <crud-component
        v-for="crud in cruds"
        v-bind="crud"
        :key="crud.id"
        @update="update"
        @delete="del"
      ></crud-component>

      <div>
        <button @click="create" class="ui button primary">
          <i class="paper plane icon"></i>New crud
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import CrudComponent from "./CrudComponent.vue";
class Crud {
  constructor({ id, color, name }) {
    this.id = id;
    this.color = color;
    this.name = name;
  }
}

export default {
  name: "ExampleComponent",

  data() {
    return {
      cruds: [],
      mute: false
    };
  },

  methods: {
    async create() {
      const { data } = await window.axios.post("/api/cruds");
      this.cruds.push(new Crud(data));
    },
    async read() {
      const { data } = await window.axios.get("/api/cruds");
      data.forEach(crud => this.cruds.push(new Crud(crud)));
    },
    async update(id, color) {
      this.mute = true;
      await window.axios.put(`/api/cruds/${id}`, { color });
      this.cruds.find(crud => crud.id === id).color = color;
      this.mute = false;
    },
    async del(id) {
      await window.axios.delete(`/api/cruds/${id}`);
      let index = this.cruds.findIndex(crud => crud.id === id);
      this.cruds.splice(index, 1);
    }
  },

  components: {
    CrudComponent
  },

  watch: {
    mute(val){
      document.getElementById('mute').className = val ? "on" : ""
    }
  },

  created() {
    this.read();
  }
};
</script>