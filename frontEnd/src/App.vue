<script>

import Select from "@/components/modules/Select.vue";
import Card from "@/components/modules/Card.vue";

export default {
  components: { Select, Card },
  data() {
    return {
      ip : true,
      selectedOption: ''
    }
  },
  methods: {
    handleOptionSelected(option) {
      this.ip = false
      this.selectedOption = option;
    }
  },
}
</script>

<template>
  <div class="app">
    <Select @option-selected="handleOptionSelected" />
    <Card :ip="ip" :selectedOption="selectedOption"/>
  </div>
</template>

<style scoped>
  .app{
    height: 80vh;
    justify-content: center;
    display: flex;
    flex-direction: column;
    gap: 5rem;
  }
</style>
