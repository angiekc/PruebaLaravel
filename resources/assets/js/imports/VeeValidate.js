import messages from '../../../../node_modules/vee-validate/dist/locale/es';
import VeeValidate, { Validator } from 'vee-validate';

Validator.extend('verify_age', {    
    validate: value => {
        var today = moment()
        var age = today.diff(value,"years")
        if(age >= 18)
          return age
        else
          return false 
    }
});

Validator.localize('es', messages);
const config = {
  errorBagName: 'errors', // change if property conflicts
  fieldsBagName: 'fields',
  delay: 0,
  locale: 'es',
  dictionary: null,
  strict: true,
  classes: false,
  classNames: {
    touched: 'touched', // the control has been blurred
    untouched: 'untouched', // the control hasn't been blurred
    valid: 'is-success', // model is valid
    invalid: 'is-danger', // model is invalid
    pristine: 'pristine', // control has not been interacted with
    dirty: 'dirty' // control has been interacted with
  },
  events: 'input|blur',
  inject: true,
  validity: false,
  aria: true
};

Vue.use(VeeValidate,config);
