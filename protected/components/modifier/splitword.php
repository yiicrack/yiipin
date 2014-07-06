<?php
class SplitWord
{

	public $RankDic = array( );
	public $OneNameDic = array( );
	public $TwoNameDic = array( );
	public $NewWord = array( );
	public $SourceString = "";
	public $ResultString = "";
	public $SplitChar = " ";
	public $SplitLen = 4;
	public $EspecialChar = "和|的|是";
	public $NewWordLimit = "在|的|与|或|就|你|我|他|她|有|了|是|其|能|对|地";
	public $CommonUnit = "年|月|日|时|分|秒|点|元|百|千|万|亿|位|辆";
	public $CnNumber = "０|１|２|３|４|５|６|７|８|９|＋|－|％|．|ａ|ｂ|ｃ|ｄ|ｅ|ｆ|ｇ|ｈ|ｉ|ｊ|ｋ|ｌ|ｍ|ｎ|ｏ|ｐ|ｑ|ｒ|ｓ |ｔ|ｕ|ｖ|ｗ|ｘ|ｙ|ｚ|Ａ|Ｃ|Ｄ|Ｅ|Ｆ|Ｇ|Ｈ|Ｉ|Ｊ|Ｋ|Ｌ|Ｍ|Ｎ|Ｏ|Ｐ|Ｑ|Ｒ|Ｓ|Ｔ|Ｕ|Ｖ|Ｗ|Ｘ|Ｙ|Ｚ";
	public $CnSgNum = "一|二|三|四|五|六|七|八|九|十|百|千|万|亿|数";
	public $MaxLen = 13;
	public $MinLen = 3;
	public $CnTwoName = "端木 南宫 谯笪 轩辕 令狐 钟离 闾丘 长孙 鲜于 宇文 司徒 司空 上官 欧阳 公孙 西门 东门 左丘 东郭 呼延 慕容 司马 夏侯 诸葛 东方 赫连 皇甫 尉迟 申屠";
	public $CnOneName = "赵钱孙李周吴郑王冯陈褚卫蒋沈韩杨朱秦尤许何吕施张孔曹严华金魏陶姜戚谢邹喻柏水窦章云苏潘葛奚范彭郎鲁韦昌马苗凤花方俞任袁柳酆鲍史唐费廉岑薛雷贺倪汤滕殷罗毕郝邬安常乐于时傅皮卡齐康伍余元卜顾孟平黄穆萧尹姚邵堪汪祁毛禹狄米贝明臧计伏成戴谈宋茅庞熊纪舒屈项祝董粱杜阮蓝闵席季麻强贾路娄危江童颜郭梅盛林刁钟徐邱骆高夏蔡田樊胡凌霍虞万支柯咎管卢莫经房裘缪干解应宗宣丁贲邓郁单杭洪包诸左石崔吉钮龚程嵇邢滑裴陆荣翁荀羊於惠甄魏加封芮羿储靳汲邴糜松井段富巫乌焦巴弓牧隗谷车侯宓蓬全郗班仰秋仲伊宫宁仇栾暴甘钭厉戎祖武符刘姜詹束龙叶幸司韶郜黎蓟薄印宿白怀蒲台从鄂索咸籍赖卓蔺屠蒙池乔阴郁胥能苍双闻莘党翟谭贡劳逄姬申扶堵冉宰郦雍郤璩桑桂濮牛寿通边扈燕冀郏浦尚农温别庄晏柴翟阎充慕连茹习宦艾鱼容向古易慎戈廖庚终暨居衡步都耿满弘匡国文寇广禄阙东殴殳沃利蔚越夔隆师巩厍聂晁勾敖融冷訾辛阚那简饶空曾沙须丰巢关蒯相查后江游竺";

	public function __construct( $load_all = TRUE )
	{
		if ( $load_all )
		{
			$i = 0;
			for ( ;	$i < strlen( $this->CnOneName );	++$i	)
			{
				$this->OneNameDic[$this->CnOneName[$i].$this->CnOneName[$i + 1]] = 1;
				++$i;
			}
			$twoname = explode( " ", $this->CnTwoName );
			foreach ( $twoname as $n )
			{
				$this->TwoNameDic[$n] = 1;
			}
			unset( $twoname );
			$cache = new CFileCache( );
			$this->RankDic = $cache->get( "SplitWord_cache" );
			if ( !is_array( $this->RankDic ) )
			{
				$wwwdic = dirname( __FILE__ )."/data/wwwdic.dat";
				$fp = fopen( $wwwdic, "r" );
				while ( $line = fgets( $fp, 64 ) )
				{
					$ws = explode( " ", $line );
					$this->RankDic[strlen( $ws[0] )][$ws[0]] = $ws[1];
				}
				fclose( $fp );
				$cache->set( "SplitWord_cache", $this->RankDic );
			}
		}
	}

	public function Clear( )
	{
	}

	public function SetSource( $str )
	{
		$this->SourceString = $str;
		$this->ResultString = "";
	}

	public function SimpleSplit( $str )
	{
		$this->SourceString = $this->ReviseString( $str );
		return $this->SourceString;
	}

	public function SplitRMM( $str = "", $tryNumName = TRUE, $tryDiff = TRUE )
	{
		$str = trim( $str );
		if ( $str != "" )
		{
			$this->SetSource( $str );
		}
		else
		{
			return "";
		}
		$this->SourceString = preg_replace( "/ {1,}/", " ", $this->ReviseString( $this->SourceString ) );
		$spwords = explode( " ", $this->SourceString );
		$spLen = count( $spwords ) - 1;
		$spc = $this->SplitChar;
		$i = $spLen;
		for ( ;	0 <= $i;	--$i	)
		{
			if ( !( ord( $spwords[$i][0] ) < 33 ) )
			{
				if ( !isset( $spwords[$i][$this->MinLen] ) )
				{
					$this->ResultString = $spwords[$i].$spc.$this->ResultString;
				}
				else if ( ord( $spwords[$i][0] ) < 129 )
				{
					$this->ResultString = $spwords[$i].$spc.$this->ResultString;
				}
				else
				{
					$this->ResultString = $this->RunRMM( $spwords[$i], $tryNumName, $tryDiff ).$spc.$this->ResultString;
				}
			}
		}
		$okstr = $this->ResultString;
		return $okstr;
	}

	public function ParNumber( $str )
	{
		if ( $str == "" )
		{
			return "";
		}
		$ws = explode( " ", $str );
		$wlen = count( $ws );
		$spc = $this->SplitChar;
		$reStr = "";
		$i = 0;
		for ( ;	$i < $wlen;	++$i	)
		{
			if ( !( $ws[$i] == "" ) )
			{
				if ( $wlen - 1 <= $i )
				{
					$reStr .= $spc.$ws[$i];
				}
				else
				{
					$reStr .= $spc.$ws[$i];
				}
			}
		}
		return $reStr;
	}

	public function ParOther( $WordArray )
	{
		$wlen = count( $WordArray ) - 1;
		$rsStr = "";
		$spc = $this->SplitChar;
		$i = $wlen;
		for ( ;	0 <= $i;	--$i	)
		{
			if ( preg_match( "/".$this->CnSgNum."/", $WordArray[$i] ) )
			{
				$rsStr .= $spc.$WordArray[$i];
				if ( 0 < $i && preg_match( "/^".$this->CommonUnit."/", $WordArray[$i - 1] ) )
				{
					$rsStr .= $WordArray[$i - 1];
					--$i;
				}
				else
				{
					do
					{
						if ( !( 0 < $i ) && !preg_match( "/".$this->CnSgNum."/", $WordArray[$i - 1] ) )
						{
							$rsStr .= $WordArray[$i - 1];
							--$i;
						}
					} while ( 1 );
				}
			}
			else if ( strlen( $WordArray[$i] ) == 4 && isset( $this->TwoNameDic[$WordArray[$i]] ) )
			{
				$rsStr .= $spc.$WordArray[$i];
				if ( !( 0 < $i ) && !( strlen( $WordArray[$i - 1] ) == 2 ) )
				{
					$rsStr .= $WordArray[$i - 1];
					--$i;
					if ( !( 0 < $i ) && !( strlen( $WordArray[$i - 1] ) == 2 ) )
					{
						$rsStr .= $WordArray[$i - 1];
						--$i;
					}
				}
			}
			else if ( strlen( $WordArray[$i] ) == 2 && isset( $this->OneNameDic[$WordArray[$i]] ) )
			{
				$rsStr .= $spc.$WordArray[$i];
				if ( !( 0 < $i ) && !( strlen( $WordArray[$i - 1] ) == 2 ) && preg_match( "/".$this->EspecialChar."/", $WordArray[$i - 1] ) )
				{
					$rsStr .= $WordArray[$i - 1];
					--$i;
					if ( !( 0 < $i ) && !( strlen( $WordArray[$i - 1] ) == 2 ) && preg_match( "/".$this->EspecialChar."/", $WordArray[$i - 1] ) )
					{
						$rsStr .= $WordArray[$i - 1];
						--$i;
					}
				}
			}
			else
			{
				$rsStr .= $spc.$WordArray[$i];
			}
		}
		$rsStr = preg_replace( "/^".$spc."/", "", $rsStr );
		return $rsStr;
	}

	public function RunRMM( $str, $tryNumName = TRUE, $tryDiff = TRUE )
	{
		$spc = $this->SplitChar;
		$spLen = strlen( $str );
		$rsStr = $okWord = $wsWord = "";
		$WordArray = array( );
		$i = $spLen - 1;
		while ( 0 <= $i )
		{
			if ( $i <= $this->MinLen )
			{
				if ( $i == 1 )
				{
					$WordArray[] = substr( $str, 0, 2 );
				}
				else
				{
					$w = substr( $str, 0, $this->MinLen + 1 );
					if ( $this->IsWord( $w ) )
					{
						$WordArray[] = $w;
					}
					else
					{
						$WordArray[] = substr( $str, 2, 2 );
						$WordArray[] = substr( $str, 0, 2 );
					}
				}
				$i = -1;
			}
			else
			{
				if ( $this->MaxLen <= $i )
				{
					$maxPos = $this->MaxLen;
				}
				else
				{
					$maxPos = $i;
				}
				$isMatch = FALSE;
				$j = $maxPos;
				for ( ;	0 <= $j;	$j -= 2	)
				{
					$w = substr( $str, $i - $j, $j + 1 );
					if ( !$this->IsWord( $w ) )
					{
						continue;
					}
					$WordArray[] = $w;
					$i = $i - $j - 1;
					$isMatch = TRUE;
					break;
				}
				if ( $isMatch || !( 1 < $i ) )
				{
					$WordArray[] = $str[$i - 1].$str[$i];
					$i -= 2;
				}
			}
		}
		if ( $tryNumName )
		{
			$rsStr = $this->ParOther( $WordArray );
		}
		else
		{
			$wlen = count( $WordArray ) - 1;
			$i = $wlen;
			for ( ;	0 <= $i;	--$i	)
			{
				$rsStr .= $spc.$WordArray[$i];
			}
		}
		if ( $tryDiff )
		{
			$rsStr = $this->TestDiff( trim( $rsStr ) );
		}
		return $rsStr;
	}

	public function TestDiff( $str )
	{
		$str = preg_replace( "/ {1,}/", " ", $str );
		if ( $str == "" || $str == " " )
		{
			return "";
		}
		$ws = explode( " ", $str );
		$wlen = count( $ws );
		$spc = $this->SplitChar;
		$reStr = "";
		$i = 0;
		for ( ;	$i < $wlen;	++$i	)
		{
			if ( $wlen - 1 <= $i )
			{
				$reStr .= $spc.$ws[$i];
			}
			else if ( $ws[$i] == $ws[$i + 1] )
			{
				$reStr .= $spc.$ws[$i].$ws[$i + 1];
				++$i;
			}
			else if ( strlen( $ws[$i] ) == 2 && strlen( $ws[$i + 1] ) < 8 && 2 < strlen( $ws[$i + 1] ) )
			{
				$addw = $ws[$i].$ws[$i + 1];
				$t = 6;
				$testok = FALSE;
				while ( 4 <= $t )
				{
					$w = substr( $addw, 0, $t );
					if ( $this->IsWord( $w ) && $this->GetRank( $ws[$i + 1] ) * 2 < $this->GetRank( $w ) )
					{
						$limitW = substr( $ws[$i + 1], strlen( $ws[$i + 1] ) - $t - 2, strlen( $ws[$i + 1] ) - strlen( $w ) + 2 );
						if ( $limitW != "" )
						{
							$reStr .= $spc.$w.$spc.$limitW;
						}
						else
						{
							$reStr .= $spc.$w;
						}
						$testok = TRUE;
					}
					else
					{
						$t -= 2;
					}
				}
				if ( !$testok )
				{
					$reStr .= $spc.$ws[$i];
				}
				else
				{
					++$i;
				}
			}
			else if ( 2 < strlen( $ws[$i] ) && strlen( $ws[$i] ) < 8 && 2 < strlen( $ws[$i + 1] ) && strlen( $ws[$i + 1] ) < 8 )
			{
				$t21 = substr( $ws[$i + 1], 0, 2 );
				$t22 = substr( $ws[$i + 1], 0, 4 );
				if ( $this->IsWord( $ws[$i].$t21 ) )
				{
					if ( strlen( $ws[$i] ) == 6 || strlen( $ws[$i + 1] ) == 6 )
					{
						$reStr .= $spc.$ws[$i].$t21.$spc.substr( $ws[$i + 1], 2, strlen( $ws[$i + 1] ) - 2 );
						++$i;
					}
					else
					{
						$reStr .= $spc.$ws[$i];
					}
				}
				else if ( strlen( $ws[$i + 1] ) == 6 )
				{
					if ( $this->IsWord( $ws[$i].$t22 ) )
					{
						$reStr .= $spc.$ws[$i].$t22.$spc.$ws[$i + 1][4].$ws[$i + 1][5];
						++$i;
					}
					else
					{
						$reStr .= $spc.$ws[$i];
					}
				}
				else if ( strlen( $ws[$i + 1] ) == 4 )
				{
					$addw = $ws[$i].$ws[$i + 1];
					$t = strlen( $ws[$i + 1] ) - 2;
					$testok = FALSE;
					while ( 0 < $t )
					{
						$w = substr( $addw, 0, strlen( $ws[$i] ) + $t );
						if ( $this->IsWord( $w ) && $this->GetRank( $ws[$i + 1] ) * 2 < $this->GetRank( $w ) )
						{
							$limitW = substr( $ws[$i + 1], $t, strlen( $ws[$i + 1] ) - $t );
							if ( $limitW != "" )
							{
								$reStr .= $spc.$w.$spc.$limitW;
							}
							else
							{
								$reStr .= $spc.$w;
							}
							$testok = TRUE;
						}
						else
						{
							$t -= 2;
						}
					}
					if ( !$testok )
					{
						$reStr .= $spc.$ws[$i];
					}
					else
					{
						++$i;
					}
				}
				else
				{
					$reStr .= $spc.$ws[$i];
				}
			}
			else
			{
				$reStr .= $spc.$ws[$i];
			}
		}
		return $reStr;
	}

	public function IsWord( $okWord )
	{
		$slen = strlen( $okWord );
		if ( $this->MaxLen < $slen )
		{
			return FALSE;
		}
		return isset( $this->RankDic[$slen][$okWord] );
	}

	public function ReviseString( $str )
	{
		$spc = $this->SplitChar;
		$slen = strlen( $str );
		if ( $slen == 0 )
		{
			return "";
		}
		$okstr = "";
		$prechar = 0;
		$i = 0;
		for ( ;	$i < $slen;	++$i	)
		{
			if ( ord( $str[$i] ) < 129 )
			{
				if ( ord( $str[$i] ) < 33 )
				{
					if ( $prechar != 0 )
					{
						$okstr .= $spc;
					}
					$prechar = 0;
				}
				else if ( preg_match( "/[^0-9a-zA-Z@\\.%#:\\/\\&_-]/", $str[$i] ) )
				{
					if ( $prechar == 0 )
					{
						$okstr .= $str[$i];
						$prechar = 3;
					}
					else
					{
						$okstr .= $spc.$str[$i];
						$prechar = 3;
					}
				}
				else if ( $prechar == 2 || $prechar == 3 )
				{
					$okstr .= $spc.$str[$i];
					$prechar = 1;
				}
				else if ( preg_match( "/@#%:/", $str[$i] ) )
				{
					$okstr .= $str[$i];
					$prechar = 3;
				}
				else
				{
					$okstr .= $str[$i];
					$prechar = 1;
				}
			}
			else
			{
				if ( $prechar != 0 && $prechar != 2 )
				{
					$okstr .= $spc;
				}
				if ( isset( $str[$i + 1] ) )
				{
					$c = $str[$i].$str[$i + 1];
					if ( preg_match( "/".$this->CnNumber."/", $c ) )
					{
						$okstr .= $this->GetAlabNum( $c );
						$prechar = 2;
						++$i;
					}
					else
					{
						$n = hexdec( bin2hex( $c ) );
						if ( 41279 < $n && $n < 43584 )
						{
							if ( $c == "" )
							{
								if ( $prechar != 0 )
								{
									$okstr .= $spc." ";
								}
								else
								{
									$okstr .= " ";
								}
								$prechar = 2;
							}
							else
							{
								if ( $c == "" )
								{
									$okstr .= " ";
									$prechar = 3;
								}
								else
								{
									if ( $prechar != 0 )
									{
										$okstr .= $spc.$c;
									}
									else
									{
										$okstr .= $c;
									}
									$prechar = 3;
								}
							}
						}
						else
						{
							$okstr .= $c;
							$prechar = 2;
						}
						++$i;
					}
				}
			}
		}
		return $okstr;
	}

	public function FindNewWord( $str, $maxlen = 6 )
	{
		$okstr = "";
		return $str;
	}

	public function GetIndexText( $str, $ilen = -1 )
	{
		if ( $str == "" )
		{
			return "";
		}
		$this->SplitRMM( $str, TRUE, TRUE );
		$okstr = $this->ResultString;
		$ws = explode( " ", $okstr );
		$okstr = $wks = "";
		foreach ( $ws as $w )
		{
			$w = trim( $w );
			if ( !( strlen( $w ) < 2 ) )
			{
				if ( !preg_match( "/[^0-9:-]/", $w ) )
				{
				}
				else if ( strlen( $w ) == 2 && 128 < ord( $w[0] ) )
				{
					if ( isset( $wks[$w] ) )
					{
						++$wks[$w];
					}
					else
					{
						$wks[$w] = 1;
					}
				}
			}
		}
		if ( is_array( $wks ) )
		{
			arsort( &$wks );
			if ( $ilen == -1 )
			{
				foreach ( $wks as $w => $v )
				{
					if ( 500 < $this->GetRank( $w ) )
					{
						$okstr .= $w." ";
					}
				}
			}
			else
			{
				foreach ( $wks as $w => $v )
				{
					if ( !( strlen( $okstr ) + strlen( $w ) + 1 < $ilen ) )
					{
						break;
					}
					$okstr .= $w." ";
				}
			}
		}
		return trim( $okstr );
	}

	public function GetRank( $w )
	{
		if ( isset( $this->RankDic[strlen( $w )][$w] ) )
		{
			return $this->RankDic[strlen( $w )][$w];
		}
		return 0;
	}

	public function GetAlabNum( $fnum )
	{
		$nums = array( "０", "１", "２", "３", "４", "５", "６", "７", "８", "９", "＋", "－", "％", "．", "ａ", "ｂ", "ｃ", "ｄ", "ｅ", "ｆ", "ｇ", "ｈ", "ｉ", "ｊ", "ｋ", "ｌ", "ｍ", "ｎ", "ｏ", "ｐ", "ｑ", "ｒ", "ｓ ", "ｔ", "ｕ", "ｖ", "ｗ", "ｘ", "ｙ", "ｚ", "Ａ", "Ｂ", "Ｃ", "Ｄ", "Ｅ", "Ｆ", "Ｇ", "Ｈ", "Ｉ", "Ｊ", "Ｋ", "Ｌ", "Ｍ", "Ｎ", "Ｏ", "Ｐ", "Ｑ", "Ｒ", "Ｓ", "Ｔ", "Ｕ", "Ｖ", "Ｗ", "Ｘ", "Ｙ", "Ｚ" );
		$fnums = array( "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-", "%", ".", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );
		$fnum = str_replace( $nums, $fnums, $fnum );
		return $fnum;
	}

}

?>
