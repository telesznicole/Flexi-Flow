import { Random } from 'mockjs'
import { base } from '../utils/common'

export function mockAvatarURL() {
  return base(`/images/avatar/${Random.integer(1, 3)}.png`)
}

export function mockDistanceTime() {
  return Random.pick([
    '15 min ago',
    '4 hours ago',
    '1 day ago',
    '2 day ago'
  ])
}