import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { setRem } from './utils/rem'
import './styles/index.scss'
import { RouterProvider } from 'react-router-dom'
import router from './router'

setRem()

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
)
