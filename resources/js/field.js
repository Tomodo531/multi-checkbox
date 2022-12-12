import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-multi-checkbox', IndexField)
  app.component('detail-multi-checkbox', DetailField)
  app.component('form-multi-checkbox', FormField)
})
