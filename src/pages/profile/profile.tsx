import Layout from '../../components/layout/layout'
import { base } from '../../utils/common'
import style from './profile.module.scss'

export default function Profile() {
  const goals = [
    { icon: 'fire', title: 'Activity', unit: 'min', value: '60' },
    { icon: 'food', title: 'Food', unit: 'cal', value: '2000' },
    { icon: 'flower', title: 'Recovery', unit: 'min', value: '60' },
  ];
  
  return (
    <Layout active='profile'>
      <div className={style.page}>
        <div className={style.tools}>
        <div className={style.toolAction}>
            <i className='icon-logout'></i>
          </div>
          <div className={style.toolAction}>
            <i className='icon-settings'></i>
          </div>
        </div>

        <div className={style.user}>
          <img className={style.userAvatar} src={base('/images/profile/avatar.png')} />
          <div className={style.userName}>Professor Lomelino</div>
        </div>

        <div className={style.part}>
          <div className={style.partHead}>
            <div className={style.partTitle}>Your Goals</div>
          </div>
          <div className={style.goals}>
            {goals.map((item, index) => (
              <div className={style.goalItem} key={index}>
                <div className={style.goalItemIcon}>
                  <i className={`icon-${item.icon}`}></i>
                </div>
                <div className={style.goalItemTitle}>{item.title}</div>
                <div className={style.goalItemData}>
                  <span className={style.goalItemDataValue}>{item.value}</span>
                  <span className={style.goalItemDataUnit}>{item.unit}</span>
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className={style.part}>
          <div className={style.partHead}>
            <div className={style.partTitle}>Health Status</div>
            <div className={style.partRight}>See all</div>
          </div>

          <div className={style.status}>
            <div className={style.statusItem}>
              <div className={style.statusItemTitle}>Calories</div>
              <div className={style.statusItemPic} data-pic='0'></div>
            </div>
            <div className={style.statusItem}>
              <div className={style.statusItemTitle}>Heart Rate</div>
              <div className={style.statusItemPic} data-pic='1'></div>
            </div>
            <div className={style.statusItem}>
              <div className={style.statusItemTitle}>Active Energy</div>
              <div className={style.statusItemPic} data-pic='2'></div>
            </div>
          </div>
        </div>
      </div>
    </Layout>
  )
}
