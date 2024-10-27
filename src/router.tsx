/* eslint-disable react-refresh/only-export-components */
import { lazy } from 'react'
import { createBrowserRouter, Navigate } from 'react-router-dom'

const Community = lazy(() => import('./pages/community/community'))
const CommunityList = lazy(() => import('./pages/community/community-list'))
const CommunityDetail = lazy(() => import('./pages/community/community-detail'))
const Workouts = lazy(() => import('./pages/workouts/workouts'))
const Profile = lazy(() => import('./pages/profile/profile'))

const router = createBrowserRouter([
  {
    path: '/',
    element: <Navigate to='/profile' />
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
  },
  {
    path: '/profile',
    element: <Profile />
  }
])

export default router
