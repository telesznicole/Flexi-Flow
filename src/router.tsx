/* eslint-disable react-refresh/only-export-components */
import { lazy } from 'react'
import { createBrowserRouter, Navigate } from 'react-router-dom'

const Community = lazy(() => import('./pages/community/community'))
const CommunityList = lazy(() => import('./pages/community/community-list'))
const CommunityDetail = lazy(() => import('./pages/community/community-detail'))
const Workouts = lazy(() => import('./pages/workouts/workouts'))

const router = createBrowserRouter([
  {
    path: '/',
    element: <Navigate to='/community' />
  },
  {
    path: '/community',
    element: <Community />
  },
  {
    path: '/workouts',
    element: <Workouts />
  },
  {
    path: '/community-list',
    element: <CommunityList />
  },
  {
    path: '/community-detail',
    element: <CommunityDetail />
  }
])

export default router
