import '~/init/base.js';
import '~/init/bootstrapVue.js';

import Vue
  from 'vue';

import AuditLog
  from '~/components/Admin/AuditLog.vue';

export default function (el, props) {
  return new Vue({
    el: el,
    render: (createElement) => {
      return createElement(AuditLog, {
        props: props
      });
    }
  });
}
