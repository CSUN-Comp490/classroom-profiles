import { mount } from '@vue/test-utils'
import welcome from '../../../resources/js/components/welcome.vue'
import navbar from '../../../resources/js/components/topnavbar.vue'

test('Does welcome.vue exist?', () => {
  var wrapper = mount(welcome)
  expect(wrapper.isVisible()).toBe(true)
})

test('Does navbar.vue exist?', () => {
  var wrapper = mount(navbar)
  expect(wrapper.isVisible()).toBe(true)
})