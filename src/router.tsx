/* eslint-disable react-refresh/only-export-components */
import { lazy } from 'react'
import { createBrowserRouter, Navigate } from 'react-router-dom'

const Community = lazy(() => import('./pages/community/community'))

const router = createBrowserRouter([
  {
    path: '/',
    element: <Navigate to='/community' />
  },
  {
    path: '/community',
    element: <Community />
  }
])

export default router
