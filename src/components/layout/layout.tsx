import React from 'react';
import Tabbar from '../tabbar/tabbar'
import style from './layout.module.scss'

export default function Layout(props: {
  active: string;
  children: React.ReactElement;
}) {
  return (
    <div className={style.layout}>
      <div className={style.inner}>{props.children}</div>
      <div className={style.tabbar}>
        <Tabbar active={props.active} />
      </div>
    </div>
  )
}
