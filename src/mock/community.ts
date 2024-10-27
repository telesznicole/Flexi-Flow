import { Random } from "mockjs";
import { mockAvatarURL, mockDistanceTime } from "./common";

export type CommunityItem = {
  id: string;
  avatar: string;
  name: string;
  time: string;
  title: string;
  content: string;
  top: number;
  down: number;
  comment: number;
}

export function mockCommunityItem(): CommunityItem {
  return {
    id: Random.id(),
    avatar: mockAvatarURL(),
    name: Random.name(),
    time: mockDistanceTime(),
    title: Random.title(8),
    content: Random.paragraph(4, 8),
    top: Random.integer(0, 200),
    down: Random.integer(0, 200),
    comment: Random.integer(0, 200)
  }
}

export function mockCommunityList(size: number) {
  return Array(size).fill(null).map(mockCommunityItem)
}
