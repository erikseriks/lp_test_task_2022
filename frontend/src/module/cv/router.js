const Add = () => import('@/module/cv/cv/pages/Add');
const Edit = () => import('@/module/cv/cv/pages/Edit');
const List = () => import('@/module/cv/cv/pages/List');
const View = () => import('@/module/cv/cv/pages/View');

export default [
  { path: '', name: 'CV', component: List },
  { path: 'add', name: 'CV Add', component: Add },
  { path: ':cv', name: 'CV View', component: View },
  { path: ':cv/edit', name: 'CV Edit', component: Edit },
];
