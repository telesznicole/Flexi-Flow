import Header from '../../components/header/header'
import { base } from '../../utils/common'
import Circle from './circle'
import style from './friend.module.scss'

export default function Friend() {
  const data = [
    { value: 30, max: 60, unit: 'min', icon: 'fire', title: 'Activity' },
    { value: 288, max: 2000, unit: 'cal', icon: 'food', title: 'Food' },
    { value: 18, max: 60, unit: 'min', icon: 'flower', title: 'Recovery' },
  ]

  const items = [
    { pic: '/images/pics/1.png', title: 'Basketball', dis: '50 min', time: '08:30' },
    { pic: '/images/pics/2.png', title: 'Warm Up', dis: '30 min', time: '08:00' },
  ]

  return (
    <>
      <Header title='Friends' showBack />
      <div className={style.page}>
        <div className={style.user}>
          <div className={style.userAvatar}>
            <img src={base('/images/avatar/1.png')} />
          </div>
          <div className={style.userName}>Matt</div>
        </div>

        <div className={style.data}>
          {data.map((item, index) => (
            <div className={style.dataItem} key={index}>
              <Circle {...item} />
              <div className={style.dataName}>
                <i className={`icon-${item.icon}`}></i>
                <span>{item.title}</span>
              </div>
            </div>
          ))}
        </div>

        <div className={style.items}>
          {items.map((item, index) => (
            <div className={style.card} key={index}>
              <img className={style.cardPic} src={item.pic} />
              <div className={style.cardInfo}>
                <div className={style.cardTitle}>{item.title}</div>
                <div className={style.cardDis}>{item.dis}</div>
              </div>
              <div className={style.cardTime}>{item.time}</div>
            </div>
          ))}
        </div>

        <div className={style.btn}>Chat</div>
      </div>
    </>
  )
}
