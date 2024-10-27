import Header from '../../components/header/header'
import { mockCommunityDetail } from '../../mock/community'
import style from './community-detail.module.scss'
import CommunityItem from './community-item'

export default function CommunityDetail() {
  const data = mockCommunityDetail()
  const commentNodes = data.comments.map((item) => (
    <div className={style.comment} key={item.id}>
      <div className={style.info}>
        <div className={style.top}>
          <img className={style.avatar} src={item.avatar} />
          <span className={style.name}>{item.name}</span>
        </div>
        <div className={style.content}>{item.content}</div>
      </div>
      <div className={style.time}>{item.time}</div>
    </div>
  ))
  return (
    <>
      <Header title='Distance Running' showBack />
      <div className={style.page}>
        <CommunityItem item={data.community} />
        <div className={style.caption}>Comments</div>
        <div className={style.sort}>
          <span>Sort by best</span>
          <i className='icon-arrow-down'></i>
        </div>
        <div className={style.comments}>
          {commentNodes}
        </div>
      </div>
    </>
  )
}
