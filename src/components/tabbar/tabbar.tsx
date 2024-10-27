import classNames from 'classnames'
import { TABBAR_CONFIG } from '../../constants/app'
import style from './tabbar.module.scss'

export default function Tabbar(props: {
  active: string;
}) {
  const tabbarCfg = TABBAR_CONFIG
  const itemNodes = tabbarCfg.map((cfg, index) => (
    <div className={classNames({
      [style.item]: true,
      [style.active]: props.active === cfg.id,
    })} key={index}>
      <div className={style.icon}>
        <i className={`icon-${cfg.icon}`} />
      </div>
      <div className={style.title}>{cfg.title}</div>
    </div>
  ))

  return (
    <div className={style.wrapper}>
      <div className={style.tabbar}>{itemNodes}</div>
    </div>
  )
}
