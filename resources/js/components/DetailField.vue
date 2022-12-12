<template>
  <PanelItem :index="index" :field="field">
      <template #value>
          <div class="grid mc-grid-cols-2 mc-gap-2 max-w-xl">
              <div v-for="(option) in this.fieldValue" class="flex items-center">
                  <div
                      class="rounded-full mr-2"
                      :class="option.checked ? 'bg-green-500' : 'bg-red-500'"
                      :style="{'height':'10px', 'width':'10px'}"
                  ></div>
                  <p class="font-semibold truncate">{{ option.label }}</p>
              </div>
          </div>
      </template>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

    data() {
        return {
            checked: JSON.parse(this.field.value),
            withLabels: this.field.withLabels,
        }
    },
    computed: {
        fieldValue() {
            console.log(this.withLabels)
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

