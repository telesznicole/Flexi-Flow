import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { setRem } from './utils/rem'
import './styles/index.scss'

setRem()
createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <div>Hello World</div>
  </StrictMode>,
)
