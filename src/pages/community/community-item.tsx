import classNames from 'classnames'
import { CommunityItem as ComItem } from '../../mock/community'
import style from './community-list.module.scss'
import { useNavigate } from 'react-router-dom'

export type CommunityItemProps = {
  item: ComItem
  cut?: boolean
}

export default function CommunityItem(props: CommunityItemProps) {
  const { item, cut } = props
  const navigate = useNavigate()
  const onClick = () => navigate('/community-detail')
  return (
    <div className={style.item} onClick={onClick}>
      <div className={style.head}>
        <img className={style.avatar} src={item.avatar} />
        <div className={style.info}>
          <div className={style.name}>{item.name}</div>
          <div className={style.time}>{item.time}</div>
        </div>
      </div>
      <div className={style.title}>{item.title}</div>
      <div className={classNames({
        [style.content]: true,
        [style.cut]: cut,
      })}>{item.content}</div>
      <div className={style.footer}>
        <div className={style.action}>
          <i className='icon-up'></i>
          <span>{item.top}</span>
        </div>
        <div className={style.action}>
          <i className='icon-down'></i>
          <span>{item.down}</span>
        </div>
        <div className={style.action}>
          <i className='icon-comment'></i>
          <span>{item.comment}</span>
        </div>
      </div>
    </div>
  )
}
