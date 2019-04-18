import { mount } from '@vue/test-utils'
import welcome from '../../../resources/js/components/welcome'
import navbar from '../../../resources/js/components/topnavbar'
import equipment from '../../../resources/js/components/equipment'

test('Does welcome.vue exist?', () => {
  var wrapper = mount(welcome)
  expect(wrapper.isVisible()).toBe(true)
})

test('Does navbar.vue exist?', () => {
  var wrapper = mount(navbar)
  expect(wrapper.isVisible()).toBe(true)
})

test('Does equipment.vue exist?', () => {
  var wrapper = mount(equipment)
  expect(wrapper.isVisible()).toBe(true)
})

