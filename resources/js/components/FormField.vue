<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
        <div class="grid mc-grid-cols-2 max-w-xl">
            <div v-for="(option, index) in this.options" class="flex items-center pt-2">
                <input
                    :id="index"
                    type="checkbox"
                    :checked="this.checked.includes(option)"
                    class="checkbox mr-2"
                    :class="errorClasses"
                    :value="option"
                    @input="(event) => checked(event.target.checked, option)"
                />
                <label :for="index" class="truncate overflow-hidden w-4/5">
                    {{ index }}
                </label>
            </div>
        </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  data() {
      return {
          options: [],
          checked: []
      }
  },

  methods: {
      checked(checked, value) {
          if(!checked && this.checked.includes(value)) {
              console.log(checked, value);
              this.checked = this.checked.filter(($item) => $item !== value)
          } else {
              this.checked = [...this.checked, Number(value)]
          }
      },
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.options = this.field.options
      this.checked = JSON.parse(this.field.value)
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, JSON.stringify(this.checked))
    },
  },
}
</script>
