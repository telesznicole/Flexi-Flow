import { Circle as RCircle } from 'rc-progress';
import style from './circle.module.scss'

export type CircleProps = {
  value: number;
  max: number;
  unit: string;
}

export default function Circle(props: CircleProps) {
  const percent = 100 * (props.value / props.max)
  return (
    <div className={style.circle}>
      <RCircle
        percent={percent}
        gapDegree={100}
        gapPosition="bottom"
        strokeWidth={6}
        trailWidth={6}
        strokeLinecap="round"
        strokeColor='#9a421b'
      />

      <div className={style.info}>
        <span>{props.value}/{props.max} {props.unit}</span>
      </div>
    </div>
  )
}
