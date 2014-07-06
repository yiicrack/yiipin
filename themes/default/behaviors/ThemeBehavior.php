<?php
class ThemeBehavior extends CBehavior
{
    public function processTokens($output)
    {
        //判断是否有需要替换的标记
        if(preg_match('/<{liked_\d+?}>/is', $output))
        {
            //得到所有要判断的share_id
            $liked_data = Yii::app()->user->getState('liked_data');
            if($liked_data)
            {
                $criteria = new CDbCriteria();
                $criteria->addInCondition('share_id', $liked_data);
                $criteria->compare('user_id', Yii::app()->user->isGuest ? -1 : Yii::app()->user->id);
    
                $uls = UserLikeShare::model()->findAll($criteria);
                foreach($uls as $ul)
                {
                    $output = str_replace("<{liked_{$ul->share_id}}>", '<a data="{share_id:'.$ul->share_id.'}" href="javascript:void(0)" class="hw46 left_f poster_like liked js-like"><span class="plm_bgr"></span>已喜欢</a>', $output);
                }
                foreach($liked_data as $share_id)
                {
                    $output = str_replace("<{liked_{$share_id}}>", '<a data="{share_id:'.$share_id.'}" href="javascript:void(0)" class="hw46 left_f poster_like like js-like"><span class="plm_bgr"></span><em class="lm_love">&nbsp;</em>喜欢</a>', $output);
                }
            }
        }
        return $output;
    }
}