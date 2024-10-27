import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { RouterProvider } from 'react-router-dom'
import { setRem } from './utils/rem'
import router from './router'
import './styles/index.scss'
import './styles/iconfont/style.css'

setRem()

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
