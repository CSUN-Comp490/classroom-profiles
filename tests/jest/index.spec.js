import { mount } from '@vue/test-utils'
import ExampleComponent from '../../resources/js/components/ExampleComponent.vue'

test('it works', () => {
  expect(1 + 1).toBe(2)
})

test('should mount without crashing', () => {
  const wrapper = mount(ExampleComponent)

  expect(wrapper).toMatchSnapshot()
})