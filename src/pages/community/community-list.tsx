import Header from '../../components/header/header'
import { mockCommunityList } from '../../mock/community'
import CommunityItem from './community-item'
import style from './community-list.module.scss'

export default function CommunityList() {
  const listData = mockCommunityList(4)
  return (
    <>
      <Header title='Distance Running' showBack />
      <div className={style.page}>
        {listData.map(item => <CommunityItem key={item.id} item={item} />)}
      </div>
    </>
  )
}
