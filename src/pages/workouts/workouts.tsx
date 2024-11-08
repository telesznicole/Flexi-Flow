/* eslint-disable @typescript-eslint/no-explicit-any */
import classNames from 'classnames'
import Layout from '../../components/layout/layout'
import commonStyle from '../community/community.module.scss'
import workoutsStyle from './workouts.module.scss'
import { base } from '../../utils/common'

export default function Workouts() {
  const data = [
    {
      title: 'Featured',
      height: true,
      items: [
        { image: '/images/pics/9.png', title: 'Core Workout', tag: 'Popular', time: '12min', hot: '60cal' },
        { image: '/images/pics/10.png', title: 'Cycling', tag: 'Easy', time: '50min', hot: '300cal' },
        { image: '/images/pics/11.png', title: 'Acrobatics', tag: 'Difficult', time: '30min', hot: '350cal' },
      ],
    },
    {
      title: 'Cardio',
      items: [
        { image: '/images/pics/12.png', title: 'Treadmills', time: '40min', hot: '200cal' },
        { image: '/images/pics/13.png', title: 'Rowing machine', time: '30min', hot: '350cal' },
      ],
    },
    {
      title: 'Strength',
      items: [
        { image: '/images/pics/14.png', title: 'Bench press', time: '15min', hot: '150cal' },
        { image: '/images/pics/15.png', title: 'Pull down', time: '15min', hot: '120cal' },
      ],
    },
    {
      title: 'Recovery',
      items: [
        { image: '/images/pics/16.png', title: 'Chest Stretch', time: '5min', hot: '20cal' },
        { image: '/images/pics/17.png', title: 'Back Stretch', time: '5min', hot: '25cal' },
      ],
    },
    {
      title: 'Abs Core',
      items: [
        { image: '/images/pics/18.png', title: 'Plank support', time: '20min', hot: '100cal' },
        { image: '/images/pics/19.png', title: 'Sit-up', time: '20min', hot: '120cal' },
      ],
    },
  ]
  
  return (
    <Layout active='workouts'>
      <div className={commonStyle.page}>
        {/* 搜索框 */}
        <div className={commonStyle.search}>
          <input />
          <div className={commonStyle.suffix}>
            <i className='icon-search'></i>
          </div>
        </div>
        {
          data.map((item, dataIndex) => (
            <div className={commonStyle.part} key={dataIndex}>
              <div className={commonStyle.head}>
                <div className={commonStyle.title}>{item.title}</div>
                <div className={commonStyle.right}>See all</div>
              </div>
              <div className={commonStyle.scroll}>
                <div className={workoutsStyle.content}>
                  {
                    item.items.map((sub, subIndex) => (
                      <div className={classNames({
                        [workoutsStyle.item]: true,
                        [workoutsStyle.height]: item.height
                      })} key={`${dataIndex}-${subIndex}`}>
                        <img src={base(sub.image)} />
                        <div className={workoutsStyle.infos}>
                          {(sub as any).tag ? <div className={workoutsStyle.tag}>{(sub as any).tag}</div> : null}
                          <div className={workoutsStyle.title}>{sub.title}</div>
                          <div className={workoutsStyle.icons}>
                            <div className={workoutsStyle.icon}>
                              <i className='icon-time' />
                              <span>{sub.time}</span>
                            </div>
                            <div className={workoutsStyle.icon}>
                              <i className='icon-triangle' />
                              <span>{sub.hot}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    ))
                  }
                </div>
              </div>
            </div>
          ))
        }
      </div>
    </Layout>
  )
}
