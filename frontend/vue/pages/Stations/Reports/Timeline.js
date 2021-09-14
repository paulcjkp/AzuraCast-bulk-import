import '~/init/base.js';
import '~/init/bootstrapVue.js';

import Vue
  from 'vue';

import Timeline
  from '~/components/Stations/Reports/Timeline.vue';

export default function (el, props) {
  return new Vue({
    el: el,
    render: (createElement) => {
      return createElement(Timeline, {
        props: props
      });
    }
  });
}
