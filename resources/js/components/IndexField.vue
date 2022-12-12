<template>
  <div :class="[
      this.withLabels ? 'grid xl:mc-grid-cols-2 xl:mc-min-w-[200px] mc-grid-cols-1 mc-min-w-[100px]' : 'flex flex-row flex-wrap lg:max-w-lg',
      this.fieldValue.length <= 5 && this.withLabels ? 'xl:mc-grid-cols-1 xl:mc-min-w-[100px]' : ''
  ]">
      <div v-for="(option, index) in this.fieldValue" class="flex items-center" :class="this.withLabels && 'flex-grow pr-3 pb-1 w-50'">
          <div
              class="rounded-full"
              :class="[option.checked ? 'bg-green-500' : 'bg-red-500', this.withLabels ? 'mr-2' : 'mr-1']"
              :style="{'height':'10px', 'width':'10px'}"
          ></div>
          <p class="mc-font-semibold truncate" :class="!this.withLabels && 'hidden'">{{ option.label }}</p>
      </div>
  </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    data() {
      return {
          checked: JSON.parse(this.field.value),
          withLabels: this.field.withLabels,
      }
    },
    computed: {
        fieldValue() {
            let obj = JSON.parse(JSON.stringify(this.field.options))
            return Object.keys(obj).map((key) => {
                return {
                    'label': key,
                    'value': obj[key],
                    'checked': this.checked.includes(Number(obj[key]))
                }
            });
        },
    }
}
</script>
