import classNames from 'classnames'
import Layout from '../../components/layout/layout'
import style from './community.module.scss'
import { base } from '../../utils/common'
import { useNavigate } from 'react-router-dom'

export default function Community() {
  const navigate = useNavigate()
  const fiends = [
    { image: '/images/avatar/1.png', name: 'Matt', dot: true },
    { image: '/images/avatar/2.png', name: 'Family' },
    { image: '/images/avatar/3.png', name: 'Max' },
  ]
  const communities = [
    { image: '/images/pics/1.png', title: 'Distance running' },
    { image: '/images/pics/2.png', title: 'Clean meals' }
  ]
  const discover = [
    { image: '/images/pics/3.png', title: 'Basketball' },
    { image: '/images/pics/4.png', title: 'Jump rope' },
    { image: '/images/pics/5.png', title: 'Snowboarding' },
    { image: '/images/pics/6.png', title: 'Soccer' },
    { image: '/images/pics/7.png', title: 'Ping pang' },
    { image: '/images/pics/8.png', title: 'Skateboarding' },
  ]

  const onClickCommunity = () => navigate('/community-list')

  return (
    <Layout active='community'>
      <div className={style.page}>
        {/* 搜索框 */}
        <div className={style.search}>
          <input />
          <div className={style.suffix}>
            <i className='icon-search'></i>
          </div>
        </div>
        {/* Friends */}
        <div className={style.part}>
          <div className={style.head}>
            <div className={style.title}>Friends</div>
            <div className={style.right}>See all</div>
          </div>
          <div className={style.arrows}>
            <div className={style.scroll}>
              <div className={style.friends}>
                {
                  fiends.map((item, index) => (
                    <div className={classNames({
                      [style.friend]: true,
                      [style.dot]: item.dot
                    })} key={index}>
                      <img src={base(item.image)} />
                      <span>{item.name}</span>
                    </div>
                  ))
                }
              </div>
            </div>
            <div className={style.arrow}>
              <i className='icon-arrow-left'></i>
            </div>
            <div className={style.arrow}>
              <i className='icon-arrow-right'></i>
            </div>
          </div>
        </div>
        {/* community */}
        <div className={style.part}>
          <div className={style.head}>
            <div className={style.title}>My communities</div>
          </div>
          <div className={style.scroll}>
            <div className={style.communities}>
              {
                communities.map((item, index) => (
                  <div className={style.community} key={index} onClick={onClickCommunity}>
                    <img src={item.image} />
                    <span>{item.title}</span>
                  </div>
                ))
              }
            </div>
          </div>
        </div>
        {/* discover */}
        <div className={style.part}>
          <div className={style.head}>
            <div className={style.title}>Discover</div>
            <div className={style.right}>See all</div>
          </div>
          <div className={style.discover}>
            {
              discover.map((item, index) => (
                <div className={style.discoverItem} key={index}>
                  <img src={item.image} />
                  <span>{item.title}</span>
                </div>
              ))
            }
          </div>
        </div>
      </div>
    </Layout>
  )
}