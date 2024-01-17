<script>

import Select from "@/components/modules/Select.vue";
import Card from "@/components/modules/Card.vue";

export default {
  components: { Select, Card },
  data() {
    return {
      selectedOption:
    }
  },
  methods: {
    handleOptionSelected(option) {
      this.selectedOption = option;
    }
  }
}
</script>

<template>
  <div>
    <Select @option-selected="handleOptionSelected" />
    <Card :selectedOption="selectedOption"/>
  </div>
</template>

<style scoped>

</style>
