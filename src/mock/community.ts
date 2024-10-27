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

export type Comment = {
  id: string;
  avatar: string;
  name: string;
  content: string;
  time: string;
}

export type CommunityDetailData = {
  community: CommunityItem;
  comments: Comment[];
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

export function mockCommentItem(): Comment {
  return {
    id: Random.id(),
    avatar: mockAvatarURL(),
    name: Random.name(),
    time: mockDistanceTime(),
    content: Random.paragraph(1)
  }
}

export function mockCommunityDetail(): CommunityDetailData {
  return {
    community: mockCommunityItem(),
    comments: Array(5).fill(null).map(mockCommentItem)
  }
}
