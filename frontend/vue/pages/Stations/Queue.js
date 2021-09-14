import '~/init/base.js';
import '~/init/bootstrapVue.js';

import Vue
  from 'vue';

import Queue
  from '~/components/Stations/Queue.vue';

export default function (el, props) {
  return new Vue({
    el: el,
    render: (createElement) => {
      return createElement(Queue, {
        props: props
      });
    }
  });
}
