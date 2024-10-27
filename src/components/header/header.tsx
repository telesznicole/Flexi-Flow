import { useNavigate } from 'react-router-dom'
import style from './header.module.scss'

export type HeaderProps = {
  title: string
  showBack?: boolean
}

export default function Header(props: HeaderProps) {
  const navigate = useNavigate()
  const backNode = (
    <div className={style.back} onClick={() => navigate(-1)}>
      <i className='icon-arrow-left'></i>
    </div>
  )

  return (
    <div className={style.header}>
      {props.showBack ? backNode : null}
      <div className={style.title}>{props.title}</div>
    </div>
  )
}
